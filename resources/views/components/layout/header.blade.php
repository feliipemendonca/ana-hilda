<header class="header py-2">
    <nav class="navbar">
        <div class="container">
            <ul class="nav w-100 d-none d-md-flex justify-content-between">
                <li class="nav-item d-flex align-items-center">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('images/icons/logo.svg') }}" alt="{{ env('APP_NAME') }}">
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="nav w-100 d-flex justify-content-between">
                        @isset($whatslink)
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link text-title" href="http://https://api.whatsapp.com/send?phone=+55{{ $whatslink }}&text=Oi!">
                                    <img src="{{ asset('images/icons/whatsapp.svg') }}" alt="{{ env('APP_NAME') }}">
                                    {{ $settings['whatsapp'] }}
                                </a>
                            </li>
                        @endisset
                          
                        <li class="nav-item d-flex align-items-center px-3 px-lg-5">
                            <ul class="nav w-100 d-flex justify-content-between">
                                @isset($settings['facebook'])
                                <li class="nav-item">
                                    <a class="nav-link p-0 pt-2" href="{{ $settings['facebook'] }}">
                                        <img src="{{ asset('images/icons/facebook.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                                    </a>
                                </li>
                                @endisset
                                @isset($settings['instagram'])
                                <li class="nav-item">
                                    <a class="nav-link p-2" href="{{ $settings['instagram'] }}">
                                        <img src="{{ asset('images/icons/instagram.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                                    </a>
                                </li>
                                @endisset
                                @isset($settings['youtube'])
                                <li class="nav-item">
                                    <a class="nav-link p-2" href="{{ $settings['youtube'] }}">
                                        <img src="{{ asset('images/icons/youtube.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                                    </a>
                                </li>
                                @endisset
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link d-flex align-items-center">
                                <strong class="text-link">Menu</strong>
                                <div class="navbar-toggler hamburger hamburger--squeeze js-hamburger" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                            </div>
                        </li>                            
                    </ul>
                </li>
            </ul>
            <ul class="nav w-100 d-flex justify-content-center d-md-none">
                <div class="navbar-toggler hamburger hamburger--squeeze js-hamburger position-absolute" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('images/icons/logo.svg') }}" class="img-fluid" alt="{{ env('APP_NAME') }}">
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse position-absolute w-100" id="navbarSupportedContent">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="nav w-100 d-flex justify-content-between">
                            <li class="nav-item" style="width: 33%">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link{{ Route::is('index') ? ' active' :'' }}" href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link{{ Route::is('about') ? ' active' :'' }}" href="{{ route('about') }}">Quem somos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link{{ Route::is('contacts') ? ' active' :'' }}" href="{{ route('contacts') }}">Contato</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link{{ Route::is('blogs') ? ' active' :'' }}" href="{{ route('blogs') }}">Blog</a>
                                    </li>
                                </ul>                                    
                            </li>
                            <li class="nav-item nav-two" style="width: 67%">
                                <ul class="nav w-100 d-flex flex-wrap">
                                    {{--  Refatorar tamanha clac(100% / items)  --}}
                                    @foreach ($locations as $item)
                                        @if ($item->products->count() > 0)
                                            <li class="nav-item w-50">
                                                <a class="nav-link{{ Route::is('products') ? ' active' :'' }}" 
                                                    href="{{ route('products',['slug' => $item->slug]) }}">
                                                    {{ $item->title }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4 pt-4 pt-lg-0 navbar-form d-flex justify-content-center flex-column">
                        <p><strong>Pesquise em nosso site</strong></p>
                        <div class="d-flex justify-content-center">
                            <x-form action="" class="row g-3 w-100">
                                <x-input name="seach" title="Pesquisar no site" class="form-control rounded-pill" placeholder="Pesquisar no site" />
                                <button type="submit" class="btn rounded-pill border-0">
                                    <img src="{{ asset('images/icons/lupa-header.svg') }}" alt="">
                                </button>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>