<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Controllers\Helpers\ScoresheetHelper;
use Contest\Http\Requests;
use Contest\Scoresheet;
use Illuminate\Support\Facades\Auth;


class ScoresheetController extends Controller
{

    const COUNT_FOR_PUBLISHED = 3;
    const COUNT_FOR_UNPUBLISHED = 4;
    public $judgeID;
    public $isCoordinator = false;
    public $isAdministrator = false;
    
    use ScoresheetHelper;
    
    public function __construct(){
        $this->middleware('auth');
        $this->judgeID = \Auth::id();
        if (Auth::check()) {
            $this->isCoordinator = Auth::user()->isCoordinator();
            $this->isAdministrator = Auth::user()->isAdministrator();
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
        return view('scoresheets.show.'.$viewName, ['scoresheet'=>$scoresheet,'label'=>$labelList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return 'edit - '.$id;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
        return 'update - '.$id;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
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
