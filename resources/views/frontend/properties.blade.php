@extends('layouts.frontend')

<div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Buscar
          </button>
        </h2>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div id="search-params">
                <div id="form">
                    <input type="text" id="city" name="city" placeholder="Ciutat...">
                    <select name="category" class="select2" id="category">
                        <option value="">Categoria...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select name="zone" class="select2" id="zone">
                        <option value="">Zona...</option>
                        @foreach ($zones as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                        @endforeach
                    </select>
                    <select name="status" id="status" class="select2">
                        <option value="all">Estat...</option>
                        <option value="1">En Venta...</option>
                        <option value="0">Lloguer...</option>
                    </select>
                    <input type="submit" value="Buscar" id="submit">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@section('content')

    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-12 properties-container">
                @foreach ($properties as $property)
                    <div class="property-container">
                        <div class="image-container">
                            <img src="{{ $property->images->first()->path }}">
                        </div>
                        <div class="property-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="floating-info">
                                        <span class="price">{{ number_format($property->price, 0, ',', '.') }} €{{ $property->status ? '' : '/M' }}</span>
                                        <span class="status">{{ $property->status ? 'En Venta' : 'Lloguer' }}</span>
                                        <span class="surface">{{ $property->surface }}&#13217;</span>
                                    </div>
                                    
                                    <div class="info-container">
                                        <span class="category"><i class="fas fa-building"></i> {{ $property->category->name }}</span>
                                        <span class="zone">{{ $property->zone->name }}</span>
                                    </div>
                                    
                                    <h5 class="name">{{ ucfirst($property->name) }}</h5>

                                    <span class="city"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($property->city) }}</span> <span class="address">{{ $property->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links() }}
        </div>
    </div>
@endsection
