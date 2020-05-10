@extends('layouts.app', ['page' => __('Add Image'), 'pageSlug' => 'properties'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add Image') }}</h5>
                </div>
                <form method="post" action="{{ route('images.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Image') }}">
                            @include('alerts.feedback', ['field' => 'image'])
                        </div>

                        <input type="hidden" name="property" value="{{ $property->id }}">
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection