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
                        <p>A GImmobiliaria podreu trobar les millors vivendes, locals i edificis de la provincia de Girona al millor preu, amb tota la nostra ajuda i experiència al client, ja sigui assessorament tècnic o fiscal, valoracions aproximades, gestions de subministraments</p>
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
                        <h5>Província de Girona</h5>
                        <p>La província de Girona es pot dividir en tres zones: la Costa Brava, l'interior i els Pirineus gironins. Cadascuna ofereix les seves pròpies atraccions.</p>
                        <p>El paisatge de tot l'interior de Girona és impressionant. Com que Girona es troba al nord d’Espanya i a prop de les muntanyes dels Pirineus, el clima és excel·lent. Veureu camps de fruita, verdura i gira-sol i moltes zones boscoses. Hi ha moltes rutes a peu i en bicicleta excel·lents, i sobretot totes les ciutats i pobles medievals tant bonics que hi han fan que la província destaqui.</p>
                    </div>
                </div>
                <div class="row home-content-container">
                    <div class="col-lg-8 home-content">
                        <h5>Costa Brava</h5>
                        <p>La Costa Brava és un tram de 160 quilòmetres de costa bella i escarpada a la regió de Girona. Bellesa natural, quilòmetres interminables de platges de sorra i sol d'estiu. Trobaràs moderns centres turístics internacionals al costat de pobles de pescadors verges, cales rocoses protegides i ciutats medievals amb castells antics. La Costa s'estén des de Blanes, ​​fins la frontera francesa.</p>
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
                        <p>Al Pirineu de Girona hi ha molt més del que imagines. Hi ha un paisatge de contrastos amb cims que ronden els tres mil metres, valls reposades com la Cerdanya o la vall de Camprodon, i paratges màgics com la vall de Núria. Hi ha hiverns blancs, amb estacions d'esquí de primera —Vallter, Núria, la Molina i Masella— i molts esports de muntanya i d'aventura.</p>
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
