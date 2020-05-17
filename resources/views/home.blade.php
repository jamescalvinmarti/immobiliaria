@extends('layouts.frontend')

@section('content')

    <div class="header-body text-center mb-7">
        <h1 class="title homepage">GImmobiliaria</h1>
        <div class="row justify-content-center">
            <h2 class="title">Els millors habitatges de la província de Girona</h2>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row home-content-container">
                    <div class="col-lg-8 home-content">
                        <h5>Els millors habitatges</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="col-lg-4 image-container">
                        <img src="{{ asset('black/img/propietat.jpg') }}" alt="Millors Habitatges">
                    </div>
                </div>
                <div class="row home-content-container">
                    <div class="col-lg-4 image-container">
                        <img src="{{ asset('black/img/girona.jpg') }}" alt="Millor Zona">
                    </div>
                    <div class="col-lg-8 home-content">
                        <h5>Molt bones zones</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
                <div class="row home-content-container">
                    <div class="col-lg-8 home-content">
                        <h5>Costa Brava</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="col-lg-4 image-container">
                        <img src="{{ asset('black/img/costabrava.jpg') }}" alt="La Costa Brava">
                    </div>
                </div>
                <div class="row home-content-container">
                    <div class="col-lg-4 image-container">
                        <img src="{{ asset('black/img/pirineus.jpg') }}" alt="Els Pirineus">
                    </div>
                    <div class="col-lg-8 home-content">
                        <h5>Pirineus</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 contact">
                <h4 class="title"><a href="{{ route('contact') }}">Contacta amb nosaltres</a></h4>
            </div>
        </div>
    </div>
@endsection
