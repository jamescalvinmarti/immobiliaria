@extends('layouts.app', ['page' => __('Properties'), 'pageSlug' => 'properties'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Properties</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('properties.create') }}" class="btn btn-sm btn-primary">Add property</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('alerts.success')
                    
                    <div>
                        <table class="table tablesorter">
                            <thead class=" text-primary">
                                <tr><th scope="col">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Published</th>
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
                                                    <a class="dropdown-item" href="{{ route('properties.show', ['property' => $property]) }}">Show</a>
                                                    <a class="dropdown-item" href="{{ route('properties.edit', ['property' => $property]) }}">Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-{{$property->id}}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
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
                        <h5 class="modal-title" id="ModalLabel{{$property->id}}">{{ __('Delete') }} {{ $property->name }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You are about to delete this property. Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
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