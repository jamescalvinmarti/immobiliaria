<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }
}
