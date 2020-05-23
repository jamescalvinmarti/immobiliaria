@extends('layouts.app', ['page' => __('Afegir Usuari'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Afegir Usuari') }}</h5>
                </div>
                <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nom') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>Contrasenya</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contrasenya') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>

                        <div class="form-group">
                            <label>Confirma Contrasenya</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirma Contrasenya') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection