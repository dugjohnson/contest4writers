<?php

namespace Dugjohnson\Administration;

use App\Models\Entry;
use App\Http\Controllers\Helpers\ScoresheetHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Controllers\Helpers\EntryHelper;
use App\Models\FinalScoresheet;
use App\Models\Judge;
use App\Models\Scoresheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    protected $adminPerson;
    protected $isAdministrator;
    use EntryHelper;
    use ScoresheetHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoryCounts = $this->getCategoryCountsByCoordinator($this->getAdminPerson());
        return view('admin.index', ['isAdministrator' => $this->isAdministrator, 'categoryCounts' => $categoryCounts]);
    }

    public function entries()
    {

        $entries = Entry::whereRaw($this->getRolesWhereClause($this->getAdminPerson()))->orderBy('category')->orderBy('published')->get();

        return view('admin.entry.entries', array('entries' => $entries, 'isCoordinator' => true));


    }

    public function judgesList()
    {

        //todo: Make this work with roles  $judges = Judge::whereRaw($this->getRolesWhereClause($this->getAdminPerson()))->orderBy('category')->orderBy('published')->get();
//        $judges = Judge::with('user')
//            ->join('users', 'users.id', '=', 'judges.user_id')
//            ->orderBy('judgeThisYear')
//            ->orderBy('users.lastName')
//            ->get();
        $judges = Judge::all();
        $judges = $judges->sortBy(function ($judge) {
            return strtoupper(($judge->judgeThisYear ? $judge->judgeThisYear : 'AA') . $judge->user->lastName);
        });
        return view('admin.judge.judges', array('judges' => $judges, 'isCoordinator' => true));


    }

    public function scoresheetsList($action = '')
    {
        $assign = ($action == 'assign');
        if ($assign) {

            $scoresheets = Scoresheet::all();
            $scoresheets = $scoresheets->sortBy(function ($scoresheet) {
                return strtoupper(($scoresheet->published ? 'P' : 'U') . $scoresheet->category . $scoresheet->title);
            });
            return view('admin.scoresheets.scoresheets', array('scoresheets' => $scoresheets, 'categories' => $this->categories(), 'isCoordinator' => true, 'isAdministrator' => $this->isAdministrator, 'assign' => $assign));
        } else {
            $scoresheets = Scoresheet::whereRaw($this->getRolesWhereClause($this->getAdminPerson()))->orderBy('category')->orderBy('published')->orderBy('title')->get();
            $scoresheets->load('judge');
            return view('admin.scoresheets.scoresheets', array('scoresheets' => $scoresheets, 'categories' => $this->categories(), 'isCoordinator' => true, 'isAdministrator' => $this->isAdministrator, 'assign' => $assign));

        }


    }

    private function convertValue($choice)
    {
        if ($choice == 4) {
            return 'T';
        } else {
            if ($choice == 3) {
                return 'L';
            } else {
                return '';
            }
        }
    }

    private function stripCodes($source)
    {
        $stripped = str_replace(',', ' ', $source);
        $stripped = str_replace('"', '', $stripped);
        return $stripped;
    }

    public function returnCSV($CSVType = '')
    {
        if (strtolower($CSVType) == 'finalround') {
            return $this->finalCSV();
        }

        if (strtolower($CSVType) == 'entries') {
            return $this->entryCSV();
        }

        return $this->judgeCSV($CSVType);

    }

    protected function finalCSV()
    {
        $entries = FinalScoresheet::all();

        // the csv file with the first row
        $output = implode(",", array('Judge Name','Entry ID', 'Title', 'Author', 'Category', 'finalScore', 'Rank', 'Synopsis', 'Full Manuscript', 'Other','Lookup Code'));

        foreach ($entries as $row) {
            $title = 'unpubbed_finalist_scores.csv';
            $output .= "\r" . implode(",", array($row->judge->first_name.' '.$row->judge->last_name,
                    $row->entry_id, $this->stripCodes($row->title), $this->stripCodes($row->entry->author),
                    $row->category, $row->final_score,$row->rank,
                    ($row->synopsis ? 'yes' : 'no'), ($row->full_manuscript ? 'yes' : 'no'), ($row->other ? 'yes' : 'no'),
                    $row->lookup_code )); // append each row

        }

        // headers used to make the file "downloadable", we set them manually
        // since we can't use Laravel's Response::download() function
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $title . '"',
        );

        // our response, this will be equivalent to your download() but
        // without using a local file
        return Response::make(rtrim($output, "\n"), 200, $headers);

    }

    protected function entryCSV()
    {
        $entries = Entry::all();

        // the csv file with the first row
        $output = implode(",", array('Entry ID', 'Title', 'Author', 'Email','Category', 'Pub/Unpub', 'Sex', 'LGBTQ+', 'Violence', 'Child Death'));

        foreach ($entries as $row) {
            $title = 'entries.csv';
            $output .= "\r" . implode(",", array($row->id, $this->stripCodes($row->title), $this->stripCodes($row->author), $row->authorEmail,
                    $row->category, ($row->published ? 'Pub' : 'Unpub'),
                    ($row->erotic ? 'yes' : 'no'), ($row->glbt ? 'yes' : 'no'), ($row->bdsm ? 'yes' : 'no'), ($row->childdeath ? 'yes' : 'no'))); // append each row

        }

        // headers used to make the file "downloadable", we set them manually
        // since we can't use Laravel's Response::download() function
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $title . '"',
        );

        // our response, this will be equivalent to your download() but
        // without using a local file
        return Response::make(rtrim($output, "\n"), 200, $headers);

    }

    protected function judgeCSV($CSVType = '')
    {
        //use if don't need fields from user except for sorting
        $judges = Judge::with('user')
            ->join('users', 'users.id', '=', 'judges.user_id')
            ->orderBy('users.lastName')
            ->select('judges.*')
            ->get();

        // the csv file with the first row
        $output = implode(",", array('Judge ID', 'Profile ID', 'Judge name', 'Street', 'City',
            'State', 'Zip', 'Country', 'Email', 'This Year', 'Pub Max', 'Unpub Max', 'MA', 'SH', 'HI', 'LO', 'PA', 'IN', 'Entered', 'Sex', 'LGBTQ+', 'Violence', 'Child Death'));

        foreach ($judges as $row) {
            // iterate over each tweet and add it to the csv
            $contestEntryCategories = $this->getContestEntryCategories($row->user()->first()->email);
            if (strtolower($CSVType) == 'favorite') {
                $title = 'judgefaves.csv';
                $output .= "\r" . implode(",", array($row->id, $row->user_id, $row->judgeName(), $this->stripCodes($row->user()->first()->street),
                        $row->user()->first()->city, $row->user()->first()->state, $row->user()->first()->zipCode, $row->user()->first()->country,
                        $row->user()->first()->email, $row->judgeThisYear,
                        $row->maxpubentries, $row->maxunpubentries, $this->convertValue($row->mainstream),
                        $this->convertValue($row->category), $this->convertValue($row->historical), $this->convertValue($row->singleTitle),
                        $this->convertValue($row->paranormal), $this->convertValue($row->inspirational), $contestEntryCategories,
                        ($row->erotic ? 'yes' : 'no'), ($row->glbt ? 'yes' : 'no'), ($row->bdsm ? 'yes' : 'no'), ($row->childdeath ? 'yes' : 'no'))); // append each row

            } else {
                $title = 'judges.csv';
                $output .= "\r" . implode(",", array($row->id, $row->user_id, $row->judgeName(), $this->stripCodes($row->user()->first()->street),
                        $row->user()->first()->city, $row->user()->first()->state, $row->user()->first()->zipCode, $row->user()->first()->country,
                        $row->user()->first()->email, $row->judgeThisYear,
                        $row->maxpubentries, $row->maxunpubentries, $row->mainstream,
                        $row->category, $row->historical, $row->singleTitle, $row->paranormal, $row->inspirational, $contestEntryCategories,
                        ($row->erotic ? 'yes' : 'no'), ($row->glbt ? 'yes' : 'no'), ($row->bdsm ? 'yes' : 'no'), ($row->childdeath ? 'yes' : 'no'))); // append each row

            }
        }

        // headers used to make the file "downloadable", we set them manually
        // since we can't use Laravel's Response::download() function
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $title . '"',
        );

        // our response, this will be equivalent to your download() but
        // without using a local file
        return Response::make(rtrim($output, "\n"), 200, $headers);

    }

    private function getContestEntryCategories($email)
    {
        $categories = [];
        $entryCategories = Entry::where('authorEmail', '=', $email)->get();

        foreach ($entryCategories as $entryCategory) {
            if (!in_array($entryCategory->category, $categories)) {
                $categories[] = $entryCategory->category;
            }
            if (0 < count($categories)) {
                return implode('-', $categories);
            }
            return '';

        }
    }

    public function jsonDownload()
    {

        $scoresheets = Scoresheet::get(['id', 'title', 'judge_id', 'category', 'published']);
        $scoresheets = $scoresheets->sortBy(function ($scoresheet) {
            return strtoupper(($scoresheet->published ? 'P' : 'U') . $scoresheet->category . $scoresheet->title);
        });
        $returns = array();
        foreach ($scoresheets as $key => $scoresheet) {
            $returns[] = $scoresheet;
        }
        return Response::json($returns);

    }

    public function jsonUpload(Request $request)
    {

        $data = $request->all();
        if ($request->ajax()) {
            $id = $request->get('id');
            $judge_id = $request->get('judgeID');
            $scoresheet = Scoresheet::find($id);
            $scoresheet->judge_id = $judge_id;
            $scoresheet->update();
        }
    }

    public function scoresheetSummary()
    {
        $scoreResults = DB::table('scoresheets')
            ->leftJoin('entries', 'scoresheets.entry_id', '=', 'entries.id')
            ->select(DB::raw('SUM(finalScore) as totalScore,
		MIN(finalScore) as totalScoreMinus,
		SUM(tieBreaker) as totalRanking,
		MIN(tiebreaker) as totalRankingMinus,
		SUM(finalScore)-MIN(finalScore) as totalFinal,
		SUM(tieBreaker)-MIN(tieBreaker) as totalTiebreaker,
		scoresheets.category,scoresheets.published,scoresheets.entry_id as entryNumber,entries.finalist'))
            ->whereRaw($this->getRolesWhereClause($this->getAdminPerson(), 'scoresheets'))
            ->groupBy('published')
            ->groupBy('category')
            ->groupBy('entry_id')
            ->groupBy('finalist')
            ->orderBy('published')
            ->orderBy('category')
            ->orderBy('totalFinal', 'DESC')
            ->orderBy('totalTiebreaker', 'DESC')
            ->get();
        $scoresheets = Scoresheet::all();

        return view('reports.scoresummary', ['scoreResults' => $scoreResults, 'scoresheets' => $scoresheets]);
    }

    private function getAdminPerson()
    {
        if (!isset($this->adminPerson)) {
            $this->adminPerson = Auth::user();
            if (!($this->getAdminPerson() && $this->getAdminPerson()->isCoordinator())) {
                return redirect('/home');
            }
            $this->isAdministrator = $this->getAdminPerson()->isAdministrator();
        }
        return $this->adminPerson;
    }
}
