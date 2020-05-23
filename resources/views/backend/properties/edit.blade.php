@extends('layouts.app', ['page' => __('Editar Propietat'), 'pageSlug' => 'properties'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Propietat') }}</h5>
                </div>
                <form method="post" action="{{ route('properties.update', ['property' => $property]) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nom') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{ old('name', $property->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                            <label>{{ __('Ciutat') }}</label>
                            <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciutat') }}" value="{{ old('city', $property->city) }}">
                            @include('alerts.feedback', ['field' => 'city'])
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <label>{{ __('Adreça') }}</label>
                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Adreça') }}" value="{{ old('address', $property->address) }}">
                            @include('alerts.feedback', ['field' => 'address'])
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                            <label>{{ __('Preu') }}</label>
                            <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Preu') }}" value="{{ old('price', $property->price) }}">
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>

                        <div class="form-group{{ $errors->has('surface') ? ' has-danger' : '' }}">
                            <label>{{ __('Superfície') }}</label>
                            <input type="number" name="surface" min="1" class="form-control{{ $errors->has('surface') ? ' is-invalid' : '' }}" placeholder="{{ __('Superfície') }}" value="{{ old('surface', $property->surface) }}">
                            @include('alerts.feedback', ['field' => 'surface'])
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label>{{ __('Estat') }}</label>
                            <div class="form-check">
                                <input type="radio" {{ $property->status ? 'checked' : '' }} name="status" class="form-check-input{{ $errors->has('status') ? ' is-invalid' : '' }}" value="sale">
                                <label class="form-check-label" for="status">En Venta</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" {{ !$property->status ? 'checked' : '' }} name="status" class="form-check-input{{ $errors->has('status') ? ' is-invalid' : '' }}" value="rent">
                                <label class="form-check-label" for="status">En Lloguer</label>
                            </div>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                            <label>{{ __('Categoria') }}</label>
                            <select name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'category'])
                        </div>

                        <div class="form-group{{ $errors->has('zone') ? ' has-danger' : '' }}">
                            <label>{{ __('Zona') }}</label>
                            <select name="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" value="{{ old('zone') }}">
                                @foreach ($zones as $zone)
                                    <option value="{{ $zone->id }}" {{ $property->zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'zone'])
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Descripció') }}</label>
                            <textarea type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripció') }}">{{ old('description', $property->description) }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
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