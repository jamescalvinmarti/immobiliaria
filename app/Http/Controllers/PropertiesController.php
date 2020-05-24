<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Category;
use App\Zone;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(15);
        return view('backend.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $zones = Zone::all();
        return view('backend.properties.create', compact('categories', 'zones'));
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
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'surface' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'zone' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $property = new Property();
        $property->name = $request['name'];
        $property->city = $request['city'];
        $property->address = $request['address'];
        $property->price = $request['price'];
        $property->surface = $request['surface'];
        $property->category_id = $request['category'];
        $property->zone_id = $request['zone'];
        $property->description = $request['description'];
        $property->published = false;
        if ($request['status'] == 'sale') {
            $property->status = true;
        } else {
            $property->status = false;
        }

        $property->save();

        return redirect(route('properties.index'))->withStatus(__('Propietat creada correctament.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('backend.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $zones = Zone::all();
        $property = Property::findOrFail($id);
        return view('backend.properties.edit', compact('property', 'categories', 'zones'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'surface' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'zone' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $property = Property::findOrFail($id);
        $property->name = $request['name'];
        $property->city = $request['city'];
        $property->address = $request['address'];
        $property->price = $request['price'];
        $property->surface = $request['surface'];
        $property->category_id = $request['category'];
        $property->zone_id = $request['zone'];
        $property->description = $request['description'];
        if ($request['status'] == 'sale') {
            $property->status = true;
        } else {
            $property->status = false;
        }

        $property->save();

        return redirect(route('properties.index'))->withStatus(__('Propietat modificada correctament.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // delete all the related images first, then the property
        $property->images()->delete();
        $property->delete();
        return redirect(route('properties.index'))->withStatus(__('Propietat eliminada correctament.'));
    }

    /**
     * Publish or Unpublish the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publishUnpublish($id)
    {
        $property = Property::findOrFail($id);
        if ($property->published) {
            $property->published = false;
        } else {
            $property->published = true;
        }
        $property->save();

        if ($property->published) {
            return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Propietat publicada correctament.'));
        }
        return redirect(route('properties.show', ['property' => $property]))->withStatus(__('Property successfully unpublished.'));
    }
}
