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
                            @if ($property->published)
                                <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault();  document.getElementById('publish-form').submit();">Unpublish</a>
                            @else
                                <a href="#" class="btn btn-sm btn-success" onclick="event.preventDefault();  document.getElementById('publish-form').submit();">Publicar</a>
                            @endif
                            <form id="publish-form" action="{{ route('properties.publish', ['property' => $property]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('properties.edit', ['property' => $property]) }}" class="btn btn-sm btn-primary">Editar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    @include('alerts.success')

                    <div id="images">
                        <div class="row image-header">
                            <div class="col-8">
                                <h4 class="card-title">Imatges</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('images.create', ['property' => $property]) }}" class="btn btn-sm btn-primary">Afegir Imatge</a>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6>Nom:</h6>
                                            <p>{{ $property->name }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Ciutat:</h6>
                                            <p>{{ $property->city }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Adreça:</h6>
                                            <p>{{ $property->address }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Superfície:</h6>
                                            <p>{{ $property->surface }}&#13217;</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Preu:</h6>
                                            <p>{{ $property->price }}€</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Ciutat:</h6>
                                            <p>{{ $property->city }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Categoria:</h6>
                                            <p>{{ $property->category->name }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Zona:</h6>
                                            <p>{{ $property->zone->name }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Descripció:</h6>
                                            <p>{{ $property->description }}</p>
                                        </div>

                                        <div class="form-group">
                                            <h6>Estat:</h6>
                                            @if ($property->status)
                                                <td><span class="badge badge-primary">En Venta</span></td>
                                            @else
                                                <td><span class="badge badge-info">Per Llogar</span></td>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <h6>Publicada:</h6>
                                            @if ($property->published)
                                                <td><span class="badge badge-success">Sí</span></td>
                                            @else
                                                <td><span class="badge badge-danger">No</span></td>
                                            @endif
                                        </div>
                                    </div>
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
                        <img src="{{ $image->path }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel·lar') }}</button>
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