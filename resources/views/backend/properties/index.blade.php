@extends('layouts.app', ['page' => __('Propietats'), 'pageSlug' => 'properties'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Propietats</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('properties.create') }}" class="btn btn-sm btn-primary">Afegir Propietat</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('alerts.success')
                    
                    <div>
                        <table class="table tablesorter">
                            <thead class=" text-primary">
                                <tr><th scope="col">Nom</th>
                                <th scope="col">Ciutat</th>
                                <th scope="col">Preu</th>
                                <th scope="col">Estat</th>
                                <th scope="col">Publicada</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->city }}</td>
                                        <td>{{ $property->price }}</td>

                                        @if ($property->status)
                                            <td><span class="badge badge-primary">En Venta</span></td>
                                        @else
                                            <td><span class="badge badge-info">Per Llogar</span></td>
                                        @endif

                                        @if ($property->published)
                                            <td><span class="badge badge-success">Sí</span></td>
                                        @else
                                            <td><span class="badge badge-danger">No</span></td>
                                        @endif
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('properties.show', ['property' => $property]) }}">Info</a>
                                                    <a class="dropdown-item" href="{{ route('properties.edit', ['property' => $property]) }}">Editar</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-{{$property->id}}">Eliminar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>

    @foreach ($properties as $property)
        <!-- Modal -->
        <div class="modal fade" id="modal-{{$property->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$property->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel{{$property->id}}">{{ __('Eliminar') }} {{ $property->name }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estàs a punt d'eliminar aquesta propietat. Estàs segur?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel·lar') }}</button>
                        <form action="{{ route('properties.destroy', [$property]) }}" method="POST">
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