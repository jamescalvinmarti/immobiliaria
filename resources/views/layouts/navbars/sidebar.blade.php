<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('GI') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Gimmobiliaria') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>Usuaris</p>
                </a>
            </li>

            <li @if ($pageSlug == 'categories') class="active " @endif>
                <a href="{{ route('categories.index')  }}">
                    <i class="tim-icons icon-tag"></i>
                    <p>{{ __('Categories') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'zones') class="active " @endif>
                <a href="{{ route('zones.index')  }}">
                    <i class="tim-icons icon-square-pin"></i>
                    <p>{{ __('Zones') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'properties') class="active " @endif>
                <a href="{{ route('properties.index')  }}">
                    <i class="fas fa-home"></i>
                    <p>Propietats</p>
                </a>
            </li>

            <li @if ($pageSlug == 'messages') class="active " @endif>
                <a href="{{ route('messages.index')  }}">
                    <i class="far fa-envelope"></i>
                    <p>{{ __('Missatges') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
