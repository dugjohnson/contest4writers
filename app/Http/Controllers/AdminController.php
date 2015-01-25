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
 //       $entries = \Contest\Entry::where('user_id', '=', $this->entrantID)->get();
        if ($this->isAdmin){

            $entries = \Contest\Entry::orderBy('category')->orderBy('published')->get();
            
        } else {

            $roles = $this->adminPerson->getRoles();
            $whereStatement = '';
            foreach ($roles as $role){
                if (strlen($whereStatement)>0){
                    $whereStatement .= ' OR ';
                    
                }
                $whereStatement .= " ( '$role->category' = category and $role->published = published) ";
            }
            $entries = \Contest\Entry::whereRaw($whereStatement)->orderBy('category')->orderBy('published')->get();
            
        }
        return view('admin.entries', array('entries' => $entries));
        
        
        
    }

}
