<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Requests;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Judge;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{

    protected $adminPerson;
    protected $isAdmin;
    use EntryHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->adminPerson = \Auth::user();
        if (!($this->adminPerson && $this->adminPerson->isCoordinator())) {
            return redirect('/home');
        }
        $this->isAdmin = $this->adminPerson->isAdministrator();
    }

    public function index()
    {
        $categoryCounts = $this->getCategoryCountsByCoordinator($this->adminPerson);
        return view('admin.index', ['isAdmin' => $this->isAdmin, 'categoryCounts' => $categoryCounts]);

    }

    public function entries()
    {

        $entries = Entry::whereRaw($this->getRolesWhereClause($this->adminPerson))->orderBy('category')->orderBy('published')->get();

        return view('admin.entry.entries', array('entries' => $entries, 'isCoordinator' => true));


    }

    public function judges()
    {

        //todo: Make this work with roles  $judges = Judge::whereRaw($this->getRolesWhereClause($this->adminPerson))->orderBy('category')->orderBy('published')->get();
        $judges = Judge::with('user')
            ->join('users', 'users.id', '=', 'judges.user_id')
            ->orderBy('judgeThisYear')
            ->orderBy('users.lastName')
            ->get();
        return view('admin.judge.judges', array('judges' => $judges, 'isCoordinator' => true));


    }

    public function returnCSV()
    {
        $judges = Judge::with('user')
            ->join('users', 'users.id', '=', 'judges.user_id')
            ->orderBy('users.lastName')
            ->get();

        // the csv file with the first row
        $output = implode(",", array('Judge ID', 'Judge name', 'This Year', 'Pub', 'Pub Max', 'Unpub', 'Unpub Max', 'ENB', 'MA', 'CA', 'HI', 'ST', 'PA', 'IN'));

        foreach ($judges as $row) {
            // iterate over each tweet and add it to the csv
            $output .= "\r".implode(",", array($row->user_id, $row->judgeName(), $row->judgeThisYear, $row->judgePub,
                $row->maxpubentries, $row->judgeUnpub, $row->maxunpubentries, $row->judgeEitherNotBoth, $row->mainstream,
                $row->category, $row->historical, $row->singleTitle, $row->paranormal, $row->inspirational)); // append each row
        }

        // headers used to make the file "downloadable", we set them manually
        // since we can't use Laravel's Response::download() function
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="judges.csv"',
        );

        // our response, this will be equivalent to your download() but
        // without using a local file
        return Response::make(rtrim($output, "\n"), 200, $headers);

    }
}
