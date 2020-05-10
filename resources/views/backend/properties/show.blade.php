@extends('layouts.app', ['page' => __('Property'), 'pageSlug' => 'properties'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ $property->name }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-sm btn-primary">Publish</a>
                            <a href="{{ route('properties.edit', ['property' => $property]) }}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="images">
                        <div class="row image-header">
                            <div class="col-8">
                                <h4 class="card-title">Imatges</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('images.create', ['property' => $property]) }}" class="btn btn-sm btn-primary">Afegir Imatge</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slideshow-container">
                                    @foreach ($property->images as $image)
                                        <div class="mySlides ">
                                            <img src="{{ asset('black/img/') . '/' . $image->path }}" data-toggle="modal" data-target="#modal-{{$image->id}}" style="width:100%">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($property->images as $image)
        <!-- Modal -->
        <div class="modal fade image-modal" id="modal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$image->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel{{$image->id}}">{{ __('Imatge') }} {{ $image->name }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('black/img/') . '/' . $image->path }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form action="{{ route('images.destroy', [$image]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    
@endsection