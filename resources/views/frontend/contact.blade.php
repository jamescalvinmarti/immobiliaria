@extends('layouts.frontend')

@section('content')
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h1 class="title">Contacte</h1>

                @include('alerts.success')
    
                <div id="contact-form">
                    <form action="" method="post">
                        @csrf

                        <input type="email" name="email" placeholder="Email...">
                        <textarea name="message" cols="30" rows="10" placeholder="Missatge..."></textarea>
                        <input type="submit" value="Enviar" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection