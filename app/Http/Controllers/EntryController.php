<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Requests;
use Contest\Http\Controllers\Controller;
use Contest\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing;

class EntryController extends Controller
{

    public $categories = ['CA' => 'Category', 'HI' => 'Historical', 'IN' => 'Inspirational', 'MA' => 'Mainstream', 'PA' => 'Paranormal', 'ST' => 'Single Title',];
    public $months = ['01/14' => '01/14', '02/14' => '02/14', '03/14' => '03/14', '04/14' => '04/14', '05/14' => '05/14', '06/14' => '06/14', '07/14' => '07/14', '08/14' => '08/14', '09/14' => '09/14', '10/14' => '10/14', '11/14' => '11/14', '12/14' => '12/14'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        return redirect('entries/'.$id);
        return view('entry.index');

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
        $entrant = \Contest\User::find( \Auth::user()->id);
        $entry->author = $entrant->writingName;
        return view('entry.formpub', array('categories' => $categorySelector, 'monthlist' => $monthSelector, 'entry'=> $entry));
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
        $entrant = \Contest\User::find( \Auth::user()->id);
        $entry->author = $entrant->writingName;
        return view('entry.formunpub', array('categories' => $categorySelector, 'entry'=> $entry));
    }

    public function addEntry($request)
    {
        $id = Auth::user()->id;
        // redirect
        $entry = new Entry();
        $entry->published = $request->published;
        $entry->user_id = $id;
        $entry->author = $request->author;
        $entry->title = $request->title;
        $entry->category = $request->category;
        $entry->dateOfEntry = \Carbon::now();
        $entry->signed = $request->signed;
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
        }
        $entry->save();
        header('Location: /entries/'.$id);
        exit;
        return redirect('/entries/'.$id);
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
        $entries = Entry::where('user_id','=',$id)->get();
        return view('entry.show',array('entries'=>$entries));
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
    }

}
