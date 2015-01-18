<?php namespace Contest\Http\Controllers;

use Contest\Http\Requests\UserRequest;
use Contest\User;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Session;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return Redirect::to('home');

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
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user'=>$user]);
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
        return view('user.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, UserRequest $request) {
        $user = User::find($id);
        // store
        $user = user::find($id);
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
}
