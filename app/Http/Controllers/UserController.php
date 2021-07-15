<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('pages.users.index', ['users' => $users]);
    }

    public  function add() {
        return view('pages.users.add');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin') ?? false;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect(route('users_index'));
    }
    public  function edit( User $user) {
        return view('pages.users.edit', ['user' =>$user]);
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin') ?? false;
        $user->save();

        return redirect(route('users_index'));
    }

}
