@extends('layouts.frontend')

@section('content')
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h1 class="title">{{ ucfirst($property->name) }}</h1>
    
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