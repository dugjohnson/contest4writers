<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Validation;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends KODController
{

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

    public function destroy($id)
    {
        if (!$this->isAdministrator) {
            return redirect('home');
        }
        $user = User::find($id);
        if ($id == $user->id) {
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
    public function update(UserRequest $request, $id)
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
