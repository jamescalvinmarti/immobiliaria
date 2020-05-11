@extends('layouts.app', ['page' => __('Zones'), 'pageSlug' => 'zones'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Zones</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('zones.create') }}" class="btn btn-sm btn-primary">Add zone</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('alerts.success')
                    
                    <div>
                        <table class="table tablesorter">
                            <thead class=" text-primary">
                                <tr><th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                
                                @foreach ($zones as $zone)
                                    <tr>
                                        <td>{{ $zone->name }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('zones.edit', ['zone' => $zone]) }}">Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-{{$zone->id}}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $zones->links() }}
                </div>
            </div>
        </div>
    </div>

    @foreach ($zones as $zone)
        <!-- Modal -->
        <div class="modal fade" id="modal-{{$zone->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$zone->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel{{$zone->id}}">{{ __('Delete') }} {{ $zone->name }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You are about to delete this zone. Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form action="{{ route('zones.destroy', [$zone]) }}" method="POST">
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