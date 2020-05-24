<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function index(User $users)
    {
        return view('backend.users.index', ['users' => $users->paginate(15)]);
    }

    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Display a listing of the users
     *
     * @param Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect(route('user.index'))->withStatus(__('Usuari creat correctament.'));
    }

    /**
     * Display edit form
     *
     * @param \App\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Display a listing of the users
     *
     * @param Illuminate\Http\Request  $request
     * @param \App\User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return redirect(route('user.index'))->withStatus(__('Usuari modificat correctament.'));
    }

    /**
     * Display a listing of the users
     *
     * @param \App\User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))->withStatus(__('Usuari eliminat correctament.'));
    }
}
