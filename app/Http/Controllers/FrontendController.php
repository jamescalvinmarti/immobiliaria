<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Zone;
use App\Property;

class FrontendController extends Controller
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $categories = Category::all();
        $zones = Zone::all();
        $properties = Property::where('published', true)->get();
        return view('home', compact('categories', 'zones', 'properties'));
    }
}
