<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;

class APIZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Zone::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Zone::findOrFail($id);
    }
}
