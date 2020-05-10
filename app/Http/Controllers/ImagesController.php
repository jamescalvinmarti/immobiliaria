<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Property;
use File;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $property = Property::findOrFail($id);
        return view('backend.images.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'file', 'image'],
            'property' => ['required', 'integer'],
        ]);

        $property = Property::findOrFail($request['property']);

        // Store image in to the server
        $file = $request->file('image');
        $filename = time() . $property->name;
        $path = public_path() . "/black/img/";
        $file->move($path, $filename);

        // Save image url to the database
        $image = new Image();
        $image->path = $filename;
        $image->property_id = $property->id;
        $image->save();

        return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Property successfully updated.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $property = $image->property;
        $file = asset('black/img/') . '/' . $image->path;

        if (File::exists($file)) {
            File::delete($file);
        }

        $image->delete();
        return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Image successfully deleted.'));
    }
}
