<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Property;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
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

        $path = $request->file('image')->store('images', 's3');
        $filename = basename($path);

        $exists = Storage::disk('s3')->exists($filename);

        $image = new Image();
        $image->filename = basename($path);
        $image->path = Storage::disk('s3')->url($path);
        $image->property_id = $property->id;

        $image->save();

        return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Property successfully updated.'));
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
        $image->delete();

        return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Image successfully deleted.'));
    }
}
