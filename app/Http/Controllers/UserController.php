<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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
        return view('users.index', ['users' => $users->paginate(15)]);
    }

    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Display a listing of the users
     *
     * @param \App\User  $user
     * @return \Illuminate\View\View
     */
    public function store()
    {
        return view('users.index');
    }

    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('users.edit');
    }

    /**
     * Display a listing of the users
     *
     * @param \App\User  $user
     * @return \Illuminate\View\View
     */
    public function update()
    {
        return view('users.index');
    }

    /**
     * Display a listing of the users
     *
     * @param \App\User  $user
     * @return \Illuminate\View\View
     */
    public function destroy()
    {
        return view('users.index');
    }
}
