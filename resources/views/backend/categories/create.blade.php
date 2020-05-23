@extends('layouts.app', ['page' => __('Crear Categoria'), 'pageSlug' => 'categories'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Crear Categoria') }}</h5>
                </div>
                <form method="post" action="{{ route('categories.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nom') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
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