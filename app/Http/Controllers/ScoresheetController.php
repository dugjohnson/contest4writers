<?php namespace App\Http\Controllers;

use App\Models\Entry;
use App\Http\Controllers\Helpers\EntryHelper;
use App\Http\Controllers\Helpers\ScoresheetHelper;
use App\Http\Requests;
use App\Models\Judge;
use App\Models\Scoresheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class ScoresheetController extends KODController
{

    const COUNT_FOR_PUBLISHED = 3;
    const COUNT_FOR_UNPUBLISHED = 4;

    use ScoresheetHelper;
    use EntryHelper;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($judgeID = 0)
    {
        //
        if ($judgeID < 1) {
            $judgeID = Auth::user()->judge->id;
        }
        $scoresheets = Scoresheet::where('judge_id', '=', $judgeID)->get();
        return view('scoresheets.index', ['scoresheets' => $scoresheets, 'categories' => $this->categories()]);
    }

    public function reopen($id)
    {
        if ($this->isAdministrator) {
            $scoresheet = Scoresheet::find($id);
            $scoresheet->completed = false;
            $scoresheet->save();
        }
        return redirect('/coordinators/scoresheets');
    }

    public function comparison($judgeID)
    {
        if ($this->isCoordinator) {
            $judge = Judge::find($judgeID);
            $queryString = "SELECT finalScore,title,judge_id,category,published,entry_id FROM scoresheets
							WHERE entry_id in
							(select distinct entry_id from scoresheets where judge_id = $judgeID)
							order by entry_id,finalScore";

            $scoresheets = DB::select($queryString);
            return view('reports.judgescorecomparison', ['scoresheets' => $scoresheets, 'judge' => $judge, 'categories' => $this->categories()]);
        } else {
            return redirect('/');
        }

    }

    public function assignedTo($judgeID)
    {
        if ($this->isCoordinator) {
            $queryString = $this->getRolesWhereClause(Auth::user());
            $queryString = '((' . $queryString . ') and judge_id = ' . $judgeID . ')';
            $scoresheets = Scoresheet::whereRaw($queryString)->get();

            $judge = Judge::find($judgeID);
            return view('scoresheets.assigned', ['scoresheets' => $scoresheets, 'judge' => $judge, 'categories' => $this->categories()]);
        } else {
            return redirect('/');
        }

    }

    protected function saveFile($request, $filename)
    {
        $destination = $_SERVER["DOCUMENT_ROOT"] . '/uploads/comments/';
        if (file_exists($destination . $filename)) {
            unlink($destination . $filename);
        }
        $request->file('filename')->move($destination, $filename);
        return;
    }

    public function postUpload(Requests\UploadFileRequest $request, $id)
    {
        if (1 == $request->isCoordinator) {
            $this->isCoordinator = true;
        }
        $scoresheet = Scoresheet::find($id);
        if (!$scoresheet->commentsFile) {
            $scoresheet->commentsFile = 'cmts-' . $scoresheet->id . '-' . $scoresheet->judge_id . '.rtf';
            $scoresheet->save();
        }
        $this->saveFile($request, $scoresheet->commentsFile);
        if ($this->isCoordinator) {
//todo:            header('Location: /coordinators/scoresheets');
            header('Location: /scoresheets');
        } else {
            header('Location: /scoresheets');
        }

        exit;
    }

    public function getUpload($id)
    {
        $scoresheet = Scoresheet::find($id);
        return view('scoresheets.edit.upload', array('scoresheet' => $scoresheet, 'categories' => $this->categories(), 'isCoordinator' => $this->isCoordinator));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $scoresheet = Scoresheet::find($id);
        $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
        $viewName = ($scoresheet->published ? 'allpub' : $scoresheet->category);
        $labelList = $this->getLabelList($scoresheet->category, $scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);
        return view('scoresheets.show.' . $viewName, ['scoresheet' => $scoresheet, 'label' => $labelList, 'tieBreakerList' => $tieBreakerList, 'categories' => $this->categories()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $scoresheet = Scoresheet::find($id);
        $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
        $viewName = ($scoresheet->published ? 'allpub' : $scoresheet->category);
        $labelList = $this->getLabelList($scoresheet->category, $scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);
        return view('scoresheets.edit.' . $viewName, ['scoresheet' => $scoresheet, 'label' => $labelList, 'tieBreakerList' => $tieBreakerList, 'categories' => $this->categories()]);
        //
    }

    private function saveInformation($scoresheet, $information)
    {
        $sheetData = json_decode($scoresheet->scoresheetData, true);
        $checkScore = 0;
        for ($i = 1; $i < 26; $i++) {
            $score = 'score' . ($i < 10 ? '0' . $i : $i);
            $comment = 'comment' . ($i < 10 ? '0' . $i : $i);
            if (isset($information[$score])) {
                $sheetData['sheet']['scores'][$score] = $information[$score][0];
                $checkScore += $information[$score][0];
            }
            if (isset($information[$comment])) {
                $sheetData['sheet']['comments'][$comment] = $information[$comment];
            }
            if ($i < 4) {
                $bonus = 'bonus' . $i;
                $sheetData['sheet']['scores'][$bonus] = (isset($information[$bonus]) ? 1 : 0);
                $checkScore += $sheetData['sheet']['scores'][$bonus];
            }
        }
        if ('complete' == $information['process_method']) {
            $scoresheet->completed = true;
            $sheetData['completed'] = true;

        }
        $sheetData['sheet']['comments']['commentFinal'] = (isset($information['commentFinal']) ? $information['commentFinal'] : '');
        $sheetData['sheet']['judgeName'] = (isset($information['judgeName']) ? $information['judgeName'] : '');
        $sheetData['sheet']['tiebreaker'] = (isset($information['tiebreaker']) ? $information['tiebreaker'] : 0);
        $scoresheet->tiebreaker = $sheetData['sheet']['tiebreaker'];
        if (!($checkScore == $sheetData['finalScore'])) {
            $sheetData['finalScore'] = $checkScore;
            $scoresheet->finalScore = $checkScore;
        }
        $scoresheet->scoresheetData = json_encode($sheetData);
        $scoresheet->save();
        if ($scoresheet->completed) {
            $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
            $this->sendJudgeConfirmation($scoresheet);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
        $scoresheet = Scoresheet::find($id);
        $information = $_REQUEST;
        $this->saveInformation($scoresheet, $information);
        Session::flash('infoMessage', 'Scoresheet updated');
        return $this->show($id);

    }


    private function createScoresheets($entry, $totalWhenDone = 0)
    {
        $count = $entry->scoresheets->count();
        if (0 == $totalWhenDone) {
            $totalWhenDone = ($entry->published ? self::COUNT_FOR_PUBLISHED : self::COUNT_FOR_UNPUBLISHED);
        }

        for ($i = $count; $i < $totalWhenDone; $i++) {
            $scoresheet = new Scoresheet();
            $scoresheet->entry_id = $entry->id;
            $scoresheet->category = $entry->category;
            $scoresheet->published = $entry->published;
            $scoresheet->title = $entry->title;
            $scoresheet->scoresheetData = json_encode($scoresheet->getBlankScoresheetData($entry->id));
            $scoresheet->save();

        }

    }

    public function getExtra()
    {
        return view('scoresheets/extra');
    }

    public function postExtra(Request $request)
    {
        $entry = $request->entry;
        $totalWhenDone = intval($request->totalWhenDone);
        $entry = Entry::find($entry);
        $this->createScoresheets($entry, $totalWhenDone);
        return $totalWhenDone . ' scoresheets for ' . $entry->id . ' ' . $entry->title . ' should now exist. <a href="/">Return to home page</a>';
    }

    public function getBatch()
    {
        return view('scoresheets/batch');
    }

    public function postBatch()
    {
        $entries = Entry::all();
        foreach ($entries as $entry) {
            $this->createScoresheets($entry);
        }
        return 'Batch scoresheets created. <a href="/">Return to home page</a>';
        //run through the entries
        //create assignments 4 for unpub, 3 for pub
        //run through the assignments
        //create one scoresheet for each

    }

}
