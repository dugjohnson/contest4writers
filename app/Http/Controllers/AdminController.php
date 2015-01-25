<?php namespace Contest\Http\Controllers;

use Contest\Http\Requests;
use Contest\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {
    
    protected $adminPerson;
    protected $isAdmin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->adminPerson = \Auth::user();
        if (! $this->adminPerson->isCoordinator()){
            return redirect('/home');
        }
        $this->isAdmin = $this->adminPerson->isAdministrator();
    }
    
    public function index(){
        return view('admin.index',['isAdmin'=>$this->isAdmin]);
        
    }
    
    public function entries(){
        
        
        
    }

}
