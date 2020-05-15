@extends('layouts.app', ['page' => __('Missatge'), 'pageSlug' => 'messages'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Missatge</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    @include('alerts.success')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        <h6>Email:</h6>
                                        <p>{{ $message->email }}</p>
                                    </div>

                                    <div class="form-group">
                                        <h6>Missatge:</h6>
                                        <p>{{ $message->message }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection