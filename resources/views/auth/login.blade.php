@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form class="form" method="post" action="{{ route('login') }}" style="margin-top: 75px;">
                @csrf
    
                <div class="card card-login card-white">
                    <div class="card-header">
                        <img src="{{ asset('black') }}/img/card-primary.png" alt="">
                        <h1 class="card-title">{{ __('Log in') }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" placeholder="Contrasenya" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
