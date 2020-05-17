<nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ route('home') }}">GImmobiliaria</a>
        </div>
        <div class="navbar-toggle d-inline">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('property-list') }}" class="nav-link">{{ __('Propietats') }}</a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('contact') }}" class="nav-link">{{ __('Contacte') }}</a>
                </li>
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="nav-item special-item ">
                        <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item special-item ">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
