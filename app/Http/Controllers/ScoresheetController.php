<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Controllers\Helpers\ScoresheetHelper;
use Contest\Http\Requests;
use Contest\Scoresheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ScoresheetController extends Controller
{

    const COUNT_FOR_PUBLISHED = 3;
    const COUNT_FOR_UNPUBLISHED = 4;
    public $judgeID = 0;
    public $user;
    public $isCoordinator = false;
    public $isAdministrator = false;
    
    use ScoresheetHelper;
    
    public function __construct(){
        $this->middleware('auth');
        
        if (Auth::check()) {
            $this->user = Auth::user();
            $this->isCoordinator = $this->user->isCoordinator();
            $this->isAdministrator = $this->user->isAdministrator();
            if ($this->user->judge){
                $this->judgeID = $this->user->judge->id;

            }
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $scoresheets = Scoresheet::where('judge_id','=',$this->judgeID)->get();
        return view('scoresheets.index',['scoresheets'=>$scoresheets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        return 'store';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $scoresheet = Scoresheet::find($id);
        $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
        $viewName = ($scoresheet->published?'allpub':$scoresheet->category);
        $labelList = $this->getLabelList($scoresheet->category,$scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);
        return view('scoresheets.show.'.$viewName, ['scoresheet'=>$scoresheet,'label'=>$labelList,'tieBreakerList'=>$tieBreakerList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $scoresheet = Scoresheet::find($id);
        $scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
        $viewName = ($scoresheet->published?'allpub':$scoresheet->category);
        $labelList = $this->getLabelList($scoresheet->category,$scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);
        return view('scoresheets.edit.'.$viewName, ['scoresheet'=>$scoresheet,'label'=>$labelList,'tieBreakerList'=>$tieBreakerList]);
        //
    }

    private function saveInformation($scoresheet,$information){
        $sheetData = json_decode($scoresheet->scoresheetData,true);
        $checkScore = 0;
        for ($i=1;$i<26;$i++){
            $score = 'score'.($i<10?'0'.$i:$i);
            $comment = 'comment'.($i<10?'0'.$i:$i);
            if (isset($information[$score])){
                $sheetData['sheet']['scores'][$score] = $information[$score][0];
                $checkScore += $information[$score][0];
            }
            if (isset($information[$comment])){
                $sheetData['sheet']['comments'][$comment] = $information[$comment];
            }
            if ($i<4){
                $bonus = 'bonus'.$i;
                $sheetData['sheet'][$bonus] = (isset($information[$bonus])?1:0);
                $checkScore += $sheetData['sheet'][$bonus];
            }
        }
        $sheetData['tiebreaker'] =  (isset($information['tiebreaker'])?$information['tiebreaker']:0);
        if (! ($checkScore == $sheetData['finalScore'])){
            $sheetData['finalScore'] = $checkScore;
            $scoresheet->finalScore = $checkScore;
        }
        $scoresheet->scoresheetData = json_encode($sheetData);
        $scoresheet->save();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $scoresheet = Scoresheet::find($id);
        $information = $_REQUEST;
        $this->saveInformation($scoresheet,$information);
        Session::flash('infoMessage','Scoresheet updated');
        return $this->show($id);

    }


    public function getBatch()
    {
        return view('scoresheets/batch');

    }

    private function createScoresheets($entry)
    {
        $count = $entry->scoresheets->count();

        for ($i = $count; $i < ($entry->published ? self::COUNT_FOR_PUBLISHED : self::COUNT_FOR_UNPUBLISHED); $i++) {
            $scoresheet = new Scoresheet();
            $scoresheet->entry_id = $entry->id;
            $scoresheet->category = $entry->category;
            $scoresheet->published = $entry->published;
            $scoresheet->title = $entry->title;
            $scoresheet->scoresheetData = json_encode($scoresheet->getBlankScoresheetData($entry->id));
            $scoresheet->save();

        }

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
