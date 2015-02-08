<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Requests;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Judge;

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
        $judges = Judge::all();

        return view('admin.judge.judges', array('judges' => $judges, 'isCoordinator' => true));


    }

}
