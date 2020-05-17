@extends('layouts.frontend')

@section('content')
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h1 class="title">{{ ucfirst($property->name) }}</h1>

                <div class="info">
                    <h4 class="price">{{ number_format($property->price, 0, ',', '.') }} €{{ $property->status ? '' : '/M' }}</h4>
                    <h4 class="status">{{ $property->status ? 'En Venta' : 'Lloguer' }}</h4>
                    <h4 class="surface">{{ $property->surface }}&#13217;</h4>
                </div>

                <div class="row info-container">
                    <div class="col-lg-6 description">
                        <p>{{ $property->description }}</p>
                    </div>
                    <div class="col-lg-6 location">
                        <span class="zone">{{ $property->zone->name }}</span>
                        <span class="category"><i class="fas fa-building"></i> {{ $property->category->name }}</span>
                        <span class="city"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($property->city) }}</span>
                        <span class="address">{{ $property->address }}</span>
                    </div>
                </div>

    
                @if (!$property->images->isEmpty())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slideshow-container">
                                @foreach ($property->images as $image)
                                    <div class="mySlides ">
                                        <img src="{{ $image->path }}" data-toggle="modal" data-target="#modal-{{$image->id}}" style="width:100%">
                                    </div>
                                @endforeach
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <div class="dots" style="text-align:center">
                                @foreach ($property->images as $index => $image)
                                    <span class="dot" onclick="currentSlide({{$index+1}})"></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection