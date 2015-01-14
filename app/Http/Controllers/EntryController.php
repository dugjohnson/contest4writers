<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing;
use Carbon\Carbon;

class EntryController extends Controller
{

    public $categories = ['CA' => 'Category', 'HI' => 'Historical', 'IN' => 'Inspirational', 'MA' => 'Mainstream', 'PA' => 'Paranormal', 'ST' => 'Single Title',];
    public $months = ['01/14' => '01/14', '02/14' => '02/14', '03/14' => '03/14', '04/14' => '04/14', '05/14' => '05/14', '06/14' => '06/14', '07/14' => '07/14', '08/14' => '08/14', '09/14' => '09/14', '10/14' => '10/14', '11/14' => '11/14', '12/14' => '12/14'];
    public $entrantID;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->entrantID = \Auth::id();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = \Contest\Entry::where('user_id', '=', $this->entrantID)->get();
        return view('entry.index', array('entries' => $entries));

        return redirect('entries/' . $this->entrantID);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createPub()
    {
        $categorySelector = array_merge(array('' => 'Pick a Category'), $this->categories);
        $monthSelector = array_merge(array('' => 'Pick a Month'), $this->months);
        $entry = new Entry();
        $entrant = \Contest\User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->published = true;
        return view('entry.createpub', array('categories' => $categorySelector, 'monthlist' => $monthSelector, 'entry' => $entry));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createUnpub()
    {
        //
        $categorySelector = array_merge(array('' => 'Pick a Category'), $this->categories);
        $entry = new Entry();
        $entrant = \Contest\User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->published = false;
        return view('entry.createunpub', array('categories' => $categorySelector, 'entry' => $entry));
    }

    public function addEntry($request)
    {
        $id = Auth::id();
        // redirect
        $entry = new Entry();
        $entry->published = $request->published;
        $entry->user_id = $this->entrantID;
        $entry->author = $request->author;
        $entry->title = $request->title;
        $entry->category = $request->category;
        $entry->dateOfEntry = Carbon::now();
        $entry->readRules = $request->readRules;
        $entry->invoiceNumber = $request->invoiceNumber;
        //$entry->dateOfEntry = $request->dateOfEntry;
        if ($request->published == false) {
            //deal with upload
            // $entry->filename = $request->filename;
            $entry->filename = 'Deal with upload';


        } else {
            $entry->publisher = $request->publisher;
            $entry->editor = $request->editor;
            $entry->publicationMonth = $request->publicationMonth;
            $entry->enteredByPublisher = $request->enteredByPublisher;
        }
        $entry->save();
        header('Location: /entries');
        exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storePub(Requests\CreatePublishedEntryRequest $request)
    {
        $this->addEntry($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeUnpub(Requests\CreateUnpublishedEntryRequest $request)
    {
        $this->addEntry($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $entry = Entry::find($id);
        if ($entry->published) {
            return view('entry.showpub', array('categories' => $this->categories, 'monthlist' => $this->months, 'entry' => $entry));
        } else {
            return view('entry.showunpub', array('categories' => $this->categories, 'monthlist' => $this->months, 'entry' => $entry));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);
        if ($entry->published) {
            return view('entry.editpub', array('categories' => $this->categories, 'monthlist' => $this->months, 'entry' => $entry));
        } else {
            return view('entry.editunpub', array('categories' => $this->categories, 'monthlist' => $this->months, 'entry' => $entry));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Requests\EditEntryRequest $request)
    {
        $entry = Entry::find($id);
        $entry->published = $request->published;
        $entry->author = $request->author;
        $entry->title = $request->title;
        $entry->category = $request->category;
        $entry->invoiceNumber = $request->invoiceNumber;
        //$entry->dateOfEntry = $request->dateOfEntry;
        if ($request->published == true) {
            $entry->publisher = $request->publisher;
            $entry->editor = $request->editor;
            $entry->publicationMonth = $request->publicationMonth;
            if (isset($request->enteredByPublisher)) {
                $entry->enteredByPublisher = $request->enteredByPublisher;
            } else {
                $entry->enteredByPublisher = false;
            }
        }
        $entry->save();
        header('Location: /entries');
        exit;
    }
}
