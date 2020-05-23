@extends('layouts.app', ['page' => __('Usuaris'), 'pageSlug' => 'users'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Usuaris</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Afegir Usuari</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @include('alerts.success')
                    
                    <div>
                        <table class="table tablesorter">
                            <thead class=" text-primary">
                                <tr><th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data de Creació</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('user.edit', ['user' => $user]) }}">Editar</a>
                                                    @if ($user != Auth::user())
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-{{$user->id}}">Eliminar</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    @foreach ($users as $user)
        @if ($user != Auth::user())
            <!-- Modal -->
            <div class="modal fade" id="modal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel{{$user->id}}">{{ __('Eliminar') }} {{ $user->name }} </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Estàs a punt d'eliminar aquest usuari. Estàs segur?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel·lar') }}</button>
                            <form action="{{ route('user.destroy', [$user]) }}" method="POST">
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
        @endif
    @endforeach

@endsection