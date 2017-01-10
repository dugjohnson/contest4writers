<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing;
use Carbon\Carbon;


class EntryController extends Controller
{

    public $entrantID;
    const LEAVE_OUT_CAPPED = true;
    const PUBLISHED = true;
    const UNPUBLISHED = false;
    protected $isCoordinator = false;

    use EntryHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->entrantID = \Auth::id();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = \Contest\Entry::where('user_id', '=', $this->entrantID)->get();
        return view('entry.index', array('entries' => $entries, 'isCoordinator' => $this->isCoordinator));

        return redirect('entries/' . $this->entrantID);

    }

    public function months()
    {
        //todo: need variable for contest date
        $yearPart = 15;
        $calcMonths = [];
        for ($i = 1; $i < 13; $i++) {
            $thisMonth = sprintf('%02u/%02u', $i, $yearPart);
            $calcMonths[$thisMonth] = $thisMonth;
        }
        return $calcMonths;
        //= ['01/14' => '01/14', '02/14' => '02/14', '03/14' => '03/14', '04/14' => '04/14', '05/14' => '05/14', '06/14' => '06/14', '07/14' => '07/14', '08/14' => '08/14', '09/14' => '09/14', '10/14' => '10/14', '11/14' => '11/14', '12/14' => '12/14'];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createPub()
    {
        $categorySelector = array_merge(array('' => 'Pick a Category'), $this->categories(self::LEAVE_OUT_CAPPED, self::PUBLISHED));
        $monthSelector = array_merge(array('' => 'Pick a Month'), $this->months());
        $entry = new Entry();
        $entrant = \Contest\User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->authorEmail = $entrant->email;
        $entry->published = true;
        return view('entry.createpub', array('categories' => $categorySelector, 'monthlist' => $monthSelector, 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createUnpub()
    {
        //
        $categorySelector = array_merge(array('' => 'Pick a Category'), $this->categories(self::LEAVE_OUT_CAPPED, self::UNPUBLISHED));
        $entry = new Entry();
        $entrant = \Contest\User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->authorEmail = $entrant->email;
        $entry->published = false;
        return view('entry.createunpub', array('categories' => $categorySelector, 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
    }

    public function addEntry($request)
    {
        // redirect
        $entry = new Entry();
        $entry->published = $request->published;
        $entry->user_id = $this->entrantID;
        $entry->author = $request->author;
        $entry->authorEmail = $request->authorEmail;
        $entry->title = $request->title;
        $entry->category = $request->category;
        $entry->dateOfEntry = Carbon::now();
        $entry->readRules = $request->readRules;
        $entry->signed = $request->signed;
        $entry->invoiceNumber = $request->invoiceNumber;

        if ($request->published == false) {
            $entry->author2 = $request->author2;
            $entry->author2Email = $request->author2Email;
            if ($request->hasFile('filename')) {
                $entry->filename = $this->saveFile($request);
            }
        } else {
            $entry->publisher = $request->publisher;
            $entry->editor = $request->editor;
            $entry->publicationMonth = $request->publicationMonth;
            $entry->enteredByPublisher = $request->enteredByPublisher;
        }
        $entry->save();
        $this->sendConfirmation($entry);
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
            return view('entry.showpub', array('categories' => $this->categories(), 'monthlist' => $this->months(), 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
        } else {
            return view('entry.showunpub', array('categories' => $this->categories(), 'monthlist' => $this->months(), 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
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
            return view('entry.editpub', array('categories' => $this->categories(self::LEAVE_OUT_CAPPED), 'monthlist' => $this->months(), 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
        } else {
            return view('entry.editunpub', array('categories' => $this->categories(self::LEAVE_OUT_CAPPED), 'monthlist' => $this->months(), 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
        }
    }

    protected function saveFile($request, $filename = '')
    {
        if (!$filename) {
            $filename = date('ymdHis') . mt_rand(1000, 9999) . '.rtf';
        }
        $destination = $_SERVER["DOCUMENT_ROOT"] . '/uploads/entries/';
        if (file_exists($destination . $filename)) {
            unlink($destination . $filename);
        }
        $request->file('filename')->move($destination, $filename);
        return $filename;
    }

    public function postUpload(Requests\UploadFileRequest $request, $id)
    {
        if (1 == $request->isCoordinator) {
            $this->isCoordinator = true;
        }
        $filename = Entry::find($id)->filename;
        $this->saveFile($request, $filename);
        if ($this->isCoordinator) {
            header('Location: /coordinators/entries');
        } else {
            header('Location: /entries');
        }

        exit;
    }

    public function getUpload($id)
    {
        $entry = Entry::find($id);
        return view('entry.upload', array('entry' => $entry, 'isCoordinator' => $this->isCoordinator));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Requests\EditEntryRequest $request, $id)
    {
        $entry = Entry::find($id);
        if (1 == $request->isCoordinator) {
            $this->isCoordinator = true;
        }
        $entry->published = $request->published;
        $entry->author = $request->author;
        $entry->title = $request->title;
        $entry->signed = $request->signed;
        $entry->invoiceNumber = $request->invoiceNumber;
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
        $entry->authorEmail = $request->authorEmail;
        if (!$request->published) {
            $entry->author2 = $request->author2;
            $entry->author2Email = $request->author2Email;
        }
        if ($this->isCoordinator) {
            $entry->received = $request->received;
            $entry->finalist = $request->finalist;
        }
        if (isset($request->category)) {
            $entry->category = $request->category;
        }

        $entry->save();
        if ($this->isCoordinator) {
            header('Location: /coordinators/entries');
        } else {
            $this->sendConfirmation($entry);
            header('Location: /entries');
        }

        exit;
    }

    public function coordinatorShow($id)
    {
        $this->isCoordinator = true;
        return $this->show($id);
    }

    public function coordinatorEdit($id)
    {
        $this->isCoordinator = true;
        return $this->edit($id);
    }

    public function coordinatorUpload($id)
    {
        $this->isCoordinator = true;
        return $this->getUpload($id);
    }
}
