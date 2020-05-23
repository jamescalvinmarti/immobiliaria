@extends('layouts.app', ['page' => __('Editar Categoria'), 'pageSlug' => 'categories'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Categoria') }}</h5>
                </div>
                <form method="post" action="{{ route('categories.update', ['category' => $category]) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nom') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{ old('name', $category->name) }}">
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