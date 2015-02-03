<?php namespace Contest\Http\Controllers;

use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Http\Controllers\Helpers\JudgeHelper;
use Contest\Http\Requests;
use Contest\Judge;

class JudgeController extends Controller
{

    const PUBLISHED = true;
    const UNPUBLISHED = false;
    protected $isCoordinator = false;
    public $judgeUserID;
    public $judge;

    use JudgeHelper;
    use EntryHelper;

    public function isJudge()
    {
        return (!$this->judge->isEmpty());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->judgeUserID = \Auth::id();
        $this->judge = Judge::where('user_id', '=', $this->judgeUserID)->get();

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('judge.index', array('isJudge' => $this->isJudge(), 'judge' => $this->judge, 'isCoordinator' => $this->isCoordinator));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $judge = new Judge;
        // set defaults
        $judge->user_id = $this->judgeUserID;
        $judge->judgePub = 1;
        $judge->judgeUnpub = 1;
        $judge->judgeEitherNotBoth = 0;
        $judge->maxpubentries = 5;
        $judge->maxunpubentries = 6;
        $judge->mainstream = 3;
        $judge->category = 3;
        $judge->historical = 3;
        $judge->singleTitle = 3;
        $judge->paranormal = 3;
        $judge->inspirational = 3;
        $judge->erotic = 1;
        $judge->glbt = 1;
        $judge->bsdm = 1;
        $judge->vampires = 1;
        $judge->religious = 1;

        return view('judge.create', $this->judgeFormData($judge));
//        return view('judge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\JudgeRequest $request)
    {
        $judge = new Judge;
        // set defaults
        $this->fillInFields($request, $judge);
        $judge->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //      dd($data);
        //
        $judge = Judge::find($id);
        return view('judge.show', $this->judgeFormData($judge));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return view('judge.edit', $this->judgeFormData($this->judge));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Requests\JudgeRequest $request, $id)
    {
        //
        $judge = Judge::find($id);
        $this->fillInFields($request, $judge);
        $judge->save();
    }

    /**
     * @param Requests\JudgeRequest $request
     * @param $judge
     */
    public function fillInFields(Requests\JudgeRequest $request, $judge)
    {
        $judge->user_id = $this->judgeUserID;
        $judge->judgePub = $request->judgePub;
        $judge->judgeUnpub = $request->judgeUnpub;
        $judge->judgeEitherNotBoth = $request->judgeEitherNotBoth;
        $judge->maxpubentries = $request->maxpubentries;
        $judge->maxunpubentries = $request->maxunpubentries;
        $judge->mainstream = $request->mainstream;
        $judge->category = $request->category;
        $judge->historical = $request->historical;
        $judge->singleTitle = $request->singleTitle;
        $judge->paranormal = $request->paranormal;
        $judge->inspirational = $request->inspirational;
        $judge->erotic = $request->erotic;
        $judge->glbt = $request->glbt;
        $judge->bsdm = $request->bsdm;
        $judge->vampires = $request->vampires;
        $judge->religious = $request->religious;
        $judge->comments = $request->comments;
        if (isset($request->internalComments)) {
            $judge->internalComments = $request->internalComments;
        }
    }

}
