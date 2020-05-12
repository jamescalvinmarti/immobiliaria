@extends('layouts.frontend')

<div id="search-params">
    <form method="get">
        <input type="text" name="city" placeholder="Ciutat...">
        <select name="category" class="select2">
            <option value="">Categoria...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="zone" class="select2">
            <option value="">Zona...</option>
            @foreach ($zones as $zone)
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
            @endforeach
        </select>
        <input type="number" name="minprice" min="0" placeholder="Preu mínim...">
        <input type="number" name="maxprice" min="0" placeholder="Preu màxim...">
        <input type="submit" value="Buscar" id="submit">
    </form>
</div>

@section('content')

    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-12 properties-container">
                    @foreach ($properties as $property)
                        <div class="property-container">
                            <div class="image-container">
                                <img src="{{ asset('black/img') . '/' . $property->images->first() }}" alt="">
                            </div>
                            <div class="property-info">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
