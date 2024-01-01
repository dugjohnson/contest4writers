<?php namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\User;
use App\Http\Controllers\Helpers\EntryHelper;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing;
use Carbon\Carbon;


class EntryController extends KODController
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
        parent::__construct();
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
        $entries = Entry::where('user_id', '=', $this->entrantID)->get();
        return view('entry.index', array('entries' => $entries, 'isCoordinator' => $this->isCoordinator));

        //return redirect('entries/' . $this->entrantID);

    }

    public function months()
    {
        //todo: need variable for contest date $monthlist this is here to make it easy to find
        $year = Config::get('contest.contest_year');
        $yearPart = substr($year - 2, -2);
        $calcMonths = [];
        $yearPart = substr($year - 1, -2);
        for ($i = 1; $i < 13; $i++) {
            $thisMonth = sprintf('%02u/%02u', $i, $yearPart);
            $calcMonths[$thisMonth] = $thisMonth;
        }
        return $calcMonths;

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
        $entrant = User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->authorEmail = $entrant->email;
        $entry->published = true;
        $entry->erotic = true;
        $entry->glbt = true;
        $entry->bdsm = true;
        $entry->childdeath = true;
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
        $entrant = User::find($this->entrantID);
        $entry->author = $entrant->writingName;
        $entry->authorEmail = $entrant->email;
        $entry->published = false;
        $entry->erotic = true;
        $entry->glbt = true;
        $entry->bdsm = true;
        $entry->childdeath = true;

        return view('entry.createunpub', array('categories' => $categorySelector, 'entry' => $entry, 'isCoordinator' => $this->isCoordinator));
    }

    public function addEntry($request)
    {
        // redirect
        $entry = new Entry();
        $entry->published = filter_var($request->published, FILTER_VALIDATE_BOOLEAN);
        $entry->user_id = $this->entrantID;
        $entry->author = $request->author;
        $entry->authorEmail = $request->authorEmail;
        $entry->title = $request->title;
        $entry->category = $request->category;
        $entry->dateOfEntry = Carbon::now();
        $entry->readRules = filter_var($request->readRules, FILTER_VALIDATE_BOOLEAN);
        $entry->signed = $request->signed;
        $entry->invoiceNumber = $request->invoiceNumber;

        if ($request->published == false) {
            $entry->author2 = $request->author2;
            $entry->author2Email = $request->author2Email;
            if ($request->hasFile('filename')) {
                $entry->filename = $this->saveFile($request);
            }
        } else {
            if ($request->hasFile('filename')) {
                $filename = date('ymdHis') . mt_rand(1000, 9999) . '.pdf';
                $entry->filename = $this->saveFile($request, $filename);
            }
            $entry->publisher = $request->publisher;
            $entry->editor = $request->editor;
            $entry->publicationMonth = $request->publicationMonth;
            $entry->enteredByPublisher = filter_var($request->enteredByPublisher, FILTER_VALIDATE_BOOLEAN);
            $entry->erotic = filter_var($request->erotic, FILTER_VALIDATE_BOOLEAN);
            $entry->glbt = filter_var($request->glbt, FILTER_VALIDATE_BOOLEAN);
            $entry->bdsm = filter_var($request->bdsm, FILTER_VALIDATE_BOOLEAN);
            $entry->childdeath = filter_var($request->childdeath, FILTER_VALIDATE_BOOLEAN);

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
        $vers = rand(10000, 99999);
        $entry = Entry::find($id);
        if ($entry->published) {
            return view('entry.showpub', array('categories' => $this->categories(),
                'monthlist' => $this->months(),
                'entry' => $entry,
                'vers' => $vers,
                'isCoordinator' => $this->isCoordinator,
                'canDelete' => $this->canDelete()));
        } else {
            return view('entry.showunpub', array('categories' => $this->categories(),
                'monthlist' => $this->months(),
                'entry' => $entry,
                'vers' => $vers,
                'isCoordinator' => $this->isCoordinator,
                'canDelete' => $this->canDelete()));
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
            $filename = date('ymdHis') . mt_rand(1000, 9999) . '.pdf';
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
        $entry = Entry::find($id);
        $filename = $entry->filename;
        if (empty($filename)) {

          $filename = date('ymdHis') . mt_rand(1000, 9999) . '.pdf';
          $entry->filename = $filename;
          $entry->save();

        }
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
            $entry->enteredByPublisher = filter_var($request->enteredByPublisher, FILTER_VALIDATE_BOOLEAN);
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
        $entry->erotic = filter_var($request->erotic, FILTER_VALIDATE_BOOLEAN);
        $entry->glbt = filter_var($request->glbt, FILTER_VALIDATE_BOOLEAN);
        $entry->bdsm = filter_var($request->bdsm, FILTER_VALIDATE_BOOLEAN);
        $entry->childdeath = filter_var($request->childdeath, FILTER_VALIDATE_BOOLEAN);

        $entry->save();
        if ($this->isCoordinator) {
            header('Location: /coordinators/entries');
        } else {
            $this->sendConfirmation($entry);
            header('Location: /entries');
        }

        exit;
    }

    public function destroy($id)
    {
        if (!($this->canDelete())) {
            return redirect('home');
        }
        $entry = Entry::find($id);
        if ($id == $entry->id) {
            $entry->delete();
        }
        return redirect('coordinators/entries');

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

    private function canDelete()
    {
//Todo Need to check for entry having scoresheets or assigns
        return (Auth::check() && Auth::user()->hasRole('OC'));
    }
}
