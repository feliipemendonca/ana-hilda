@php
$items = [
    [
        'name' => 'Dashbord',
        'icon' => "<i class='ni ni-tv-2 text-primary'></i>",
        'link' => 'home',
    ],
    [
        'name' => 'Produtos',
        'icon' => "<i class='fas fa-shopping-cart text-primary'></i>",
        'link' => 'm3.products.index',
        'links' => [['link' => 'm3.products.index'], ['link' => 'm3.products.create'], ['link' => 'm3.products.show'], ['link' => 'm3.products.edit']],
    ],
    [
        'name' => 'Slides',
        'icon' => "<i class='fab fa-slideshare text-dark'></i>",
        'link' => 'm3.slides.index',
        'links' => [['link' => 'm3.slides.index'], ['link' => 'm3.slides.create'], ['link' => 'm3.slides.show'], ['link' => 'm3.slides.edit']],
    ],
    [
        'name' => 'Blog',
        'icon' => "<i class='fas fa-rss text-danger'></i>",
        'link' => 'm3.blog.index',
        'links' => [['link' => 'm3.blog.index'], ['link' => 'm3.blog.create'], ['link' => 'm3.blog.show'], ['link' => 'm3.blog.edit']],
    ],
    [
        'name' => 'Páginas Estáticas',
        'icon' => "<i class='fas fa-file-alt'></i>",
        'link' => 'm3.pages.index',
        'links' => [['link' => 'm3.pages.index'], ['link' => 'm3.pages.create'], ['link' => 'm3.pages.show'], ['link' => 'm3.pages.edit']],
    ],
];

$leads = [
    [
        'name' => 'Contatos',
        'icon' => "<i class='fas fa-headset text-danger'></i>",
        'link' => 'm3.contacts.index',
        'links' => [['link' => 'm3.contacts.index'], ['link' => 'm3.contacts.create'], ['link' => 'm3.contacts.show'], ['link' => 'm3.contacts.edit']],
    ],
];

$settings = [
    [
        'name' => 'Configurações',
        'icon' => "<i class='fas fa-cogs'></i>",
        'link' => 'm3.settings.index',
        'links' => [['link' => 'm3.settings.index'], ['link' => 'm3.settings.create'], ['link' => 'm3.settings.show'], ['link' => 'm3.settings.edit']],
    ],
];

@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images/icons/logo.svg') }}" class="navbar-brand-img" alt="{{ env('APP_NAME') }}">
        </a>
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('images/min/avatar-woman.svg') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('m3.profile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Minha Conta') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Configurações') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/icons/logo.svg') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav">
                @foreach ($items as $item)
                    <li class="nav-item">
                        <a class="nav-link @isset($item['links']) @foreach ($item['links'] as
                            $link) {{ Route::is($link['link']) ? 'active' : '' }} @endforeach @endisset" href="{{ route($item['link']) }}">
                            {!! $item['icon'] !!} {{ __($item['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Leads</h6>
            <ul class="navbar-nav">
                @foreach ($leads as $item)
                    <li class="nav-item">
                        <a class="nav-link @isset($item['links']) @foreach ($item['links'] as
                            $link) {{ Route::is($link['link']) ? 'active' : '' }} @endforeach @endisset" href="{{ route($item['link']) }}">
                            {!! $item['icon'] !!} {{ __($item['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Configurações</h6>
            <ul class="navbar-nav">
                @foreach ($settings as $item)
                    <li class="nav-item">
                        <a class="nav-link @isset($item['links']) @foreach ($item['links'] as
                            $link) {{ Route::is($link['link']) ? 'active' : '' }} @endforeach @endisset" href="{{ route($item['link']) }}">
                            {!! $item['icon'] !!} {{ __($item['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- <hr class="my-3">
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
