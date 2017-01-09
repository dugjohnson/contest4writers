<?php namespace Contest\Http\Controllers;

use Contest\Http\Requests\UserRequest;
use Contest\User;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{

    public $isCoordinator = false;
    public $isAdministrator = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->isCoordinator = Auth::user()->isCoordinator();
                $this->isAdministrator = Auth::user()->isAdministrator();
            }
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
        //
        $users = User::all();
        $users->sortBy('lastName');
        if ($this->isAdministrator) {
            return view('user.index', ['users' => $users, 'isAdministrator' => $this->isAdministrator]);

        }
        return redirect('home');

    }

//	/**
//	 * Show the form for creating a new resource.
//	 *
//	 * @return Response
//	 */
//	public function create()
//	{
//		//
//	}
//
//	/**
//	 * Store a newly created resource in storage.
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}
//
    public function destroy($id)
    {
        if (!$this->isAdministrator) {
            return redirect('home');
        }
        $user = User::find($id);
        if ($user->id) {
            $user->delete();
        }
        return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($this->isAdministrator) {
            return view('user.admin', ['user' => $user, 'isCoordinator' => $this->isCoordinator]);
        } else {
            return view('user.show', ['user' => $user, 'isCoordinator' => $this->isCoordinator]);

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
        $user = User::find($id);
        return view('user.edit', ['user' => $user, 'isCoordinator' => $this->isCoordinator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        // store
        $user = User::find($id);
        $user->email = $request->email;
        $user->email2 = $request->email2;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->writingName = $request->writingName;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->phone3 = $request->phone3;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipCode = $request->zipCode;
        $user->country = $request->country;
        $user->save();

        // redirect
        Session::flash('message', 'Successfully updated user!');
        return redirect('users/' . $id);


    }

    public function coordinatorShow($id)
    {
        $this->isCoordinator = true;
        return $this->show($id);
    }
}
