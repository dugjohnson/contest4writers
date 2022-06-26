<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Helpers\ScoresheetHelper;
use App\Http\Controllers\Helpers\EntryHelper;
use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Judge;
use App\Models\Scoresheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class CloseoutController extends KODController
{
    protected $closeoutType = [
        'unpubnonfinal' => 'Unpublished Non-Finalist',
        'pubnonfinal' => 'Published Non-Finalist',
        'unpubfinal' => 'Unpublished Finalist',
        'unpubfinalscore' => 'Unpublished Finalist Final Scores',
        'pubfinal' => 'Published Finalist',
        'judges' => 'Judges',
    ];
    use EntryHelper;
    use ScoresheetHelper;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('admin.closeout.index');
    }

    private function sendJudgeEmail($judgeID)
    {
        $judge = Judge::find($judgeID);
        $queryString = "SELECT finalScore,title,judge_id,category,published,entry_id FROM scoresheets
							WHERE entry_id in
							(select distinct entry_id from scoresheets where judge_id = $judgeID)
							order by entry_id,finalScore";

        $scoresheets = DB::select($queryString);
        $templateToUse = 'admin.closeout.emails.judges.emailbody';
        $user = User::find($judge->user_id);
        $ccEmails = array();
        $this->addAdminEmail($ccEmails, 'JC');
        $this->addAdminEmail($ccEmails, 'OC');
        $ccEmails[] = ['email' => 'doug@asknice.com', 'name' => 'Webmaster'];

        Mail::send($templateToUse, array('user' => $user,
            'judge' => $judge,
            'scoresheets' => $scoresheets,
            'categories' => $this->categories()), function ($message) use ($judge, $ccEmails, $user) {
            $message->to($user->email, $user->writingName)->subject('Thank you for judging this year');
//			$message->to( 'doug@asknice.com', $user->writingName )->subject( 'Thank you for judging this year' );    for a test run
            foreach ($ccEmails as $email) {
                $message->cc($email['email'], $email['name']);
            }

        });

    }

    private function judgeEmail()
    {
        $queryString = "SELECT DISTINCT judge_id FROM scoresheets;";
        $judges = DB::select($queryString);
        foreach ($judges as $judge) {
            $this->sendJudgeEmail($judge->judge_id);
        }
        return count($judges);
    }

    public function emailGo($type)
    {
        switch ($type) {
            case 'judges':
                $comparisons = $this->judgeEmail();
                return 'Done - sent out ' . $comparisons . ' judge emails with comparisons. <a href="/">Back to home page</a>';
            case 'unpubnonfinal':
                $published = 0;
                $finalist = 0;
                break;
            case 'pubnonfinal':
                $published = 1;
                $finalist = 0;
                break;
            case 'unpubfinal':
                $published = 0;
                $finalist = 1;
                break;
            case 'unpubfinalscore':
                $published = 0;
                $finalist = 1;
                break;
            case 'pubfinal':
                $published = 1;
                $finalist = 1;
                break;
            default:
                return 'Invalid email type ' . $type;

        }
        $entries = Entry::with('scoresheets')
            ->where('published', '=', $published)
            ->where('finalist', '=', $finalist)
            ->get();
        foreach ($entries as $entry) {
            $this->sendScores($entry, $type);
        }
        return 'Done - sent out scoresheets for ' . $entries->count() . ' entries.  <a href="/">Back to home page</a>';
    }

    public function email($type)
    {
        //this is the warning/cancel view
        return view('admin.closeout.email', ['type' => $type, 'description' => $this->closeoutType[$type]]);

    }

    public function sendScores($entry, $type)
    {
        $templateToUse = 'admin.closeout.emails.emailbody';
        // ToDo: tie this all to the author_user_id field, which needs to be set up correctly in the first place
        $user = User::find($entry->user_id);
        $ccEmails = array();
        $this->addAdminEmail($ccEmails, 'JC');
        $this->addAdminEmail($ccEmails, 'OC');
        $this->addAdminEmail($ccEmails, $entry->category, $entry->published);
        $ccEmails[] = ['email' => 'doug@asknice.com', 'name' => 'Webmaster'];
        // ToDo: fix with the above
//        if (!empty($entry->author2_user_id)) {
//            $user2 = User::find($entry->author2_user_id);
//            $ccEmails[] = ['email' => $user2->email, 'name' => $user2->writingName];
//
//        }

        $labelList = $this->getLabelList($entry->category, $entry->published);
        $tieBreakerList = $this->tieBreakerList($entry->published);
        foreach ($entry->scoresheets as $scoresheet) {
            $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;

            Mail::send($templateToUse, array('user' => $user,
                'entry' => $entry,
                'scoresheet' => $scoresheet,
                'type' => $type,
                'coordinator' => 'Jennifer Graybeal<br/>2021 Daphne Overall Coordinator',
                'label' => $labelList,
                'tieBreakerList' => $tieBreakerList,
                'email' => true,
                'categories' => $this->categories()), function ($message) use ($entry, $user, $ccEmails, $type) {
                $message->to($user->email, $user->writingName)->subject('The Score Sheets for Your Daphne entry ' . $entry->title);
//			$message->to( 'doug@asknice.com', $user->writingName )->subject( 'The Score Sheets for Your Daphne entry ' . $entry->title );
                foreach ($ccEmails as $email) {
                    $message->cc($email['email'], $email['name']);
                }

            });
        }
    }
}
