@extends('layouts.app', ['page' => __('Create Property'), 'pageSlug' => 'properties'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add Property') }}</h5>
                </div>
                <form method="post" action="{{ route('properties.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                            <label>{{ __('City') }}</label>
                            <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ old('city') }}">
                            @include('alerts.feedback', ['field' => 'city'])
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <label>{{ __('Address') }}</label>
                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address') }}">
                            @include('alerts.feedback', ['field' => 'address'])
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                            <label>{{ __('Price') }}</label>
                            <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price') }}">
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>

                        <div class="form-group{{ $errors->has('surface') ? ' has-danger' : '' }}">
                            <label>{{ __('Surface') }}</label>
                            <input type="number" name="surface" min="1" class="form-control{{ $errors->has('surface') ? ' is-invalid' : '' }}" placeholder="{{ __('Surface') }}" value="{{ old('surface') }}">
                            @include('alerts.feedback', ['field' => 'surface'])
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label>{{ __('Status') }}</label>
                            <div class="form-check">
                                <input type="radio" name="status" class="form-check-input{{ $errors->has('status') ? ' is-invalid' : '' }}" value="sale">
                                <label class="form-check-label" for="status">En Venta</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status" class="form-check-input{{ $errors->has('status') ? ' is-invalid' : '' }}" value="rent">
                                <label class="form-check-label" for="status">En Lloguer</label>
                            </div>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                            <label>{{ __('Category') }}</label>
                            <select name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'category'])
                        </div>

                        <div class="form-group{{ $errors->has('zone') ? ' has-danger' : '' }}">
                            <label>{{ __('Zone') }}</label>
                            <select name="zone" class="form-control{{ $errors->has('zone') ? ' is-invalid' : '' }}" value="{{ old('zone') }}">
                                @foreach ($zones as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'zone'])
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <textarea type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection