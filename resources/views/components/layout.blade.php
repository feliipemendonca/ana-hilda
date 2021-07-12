<!DOCTYPE html>
<html lang="en">
<head>
    @isset($settings['google-analytics-head'])
        {!! $settings['google-analytics-head'] !!}
    @endisset
    <link rel="shortcut icon" href="{{ asset('images/icons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/icons/favicon.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @isset($settings['palavras-chaves'])
    <meta name="keywords" content="{{ $settings['palavras-chaves'] }}"> 
    @endisset    
    <meta name="robots" content="index,follow,noodp">
	<meta name="googlebot" content="index,follow">
    {{ @$head }}
    @if (!Route::is('product') ||!Route::is('blog'))
    <meta name="description" content="{{ $settings['descricao-do-site'] }}">
    <meta name="subject" content="{{ $settings['descricao-do-site'] }}">
    <meta name="abstract" content="{{ $settings['descricao-do-site'] }}">
    <meta name="topic" content="{{ $settings['descricao-do-site'] }}">
    <meta name="summary" content="{{ $settings['descricao-do-site'] }}">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:image" content="{{ asset('images/icons/logo.svg') }}">
    <meta property="og:image:height" content="340">
    <meta property="og:image:width" content="500">
    <meta property="og:image:type" content="image/jpeg">	
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:locale" content="pt_BR">
    <meta itemprop="name" content="{{ env('APP_NAME') }}">
    <meta itemprop="description" content="{{ $settings['descricao-do-site'] }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ Request::url() }}">
    <meta name="twitter:url" content="{{ Request::url() }}">
    <meta name="twitter:title" content="{{ env('APP_NAME') }}">
    <meta name="twitter:description" content="{{ $settings['descricao-do-site'] }}">
    <meta name="twitter:image" content="{{ asset('images/icons/logo.svg') }}">
    @endif
    <title>Ana Hilda{{ @$title ? ' - '. $title : '' }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{ @$css }}
</head>
<body>
    @isset($settings['google-analytics-body'])
        {!! $settings['google-analytics-body'] !!}
    @endisset
    <x-layout.header />    
    {{ $content }}
    <x-newslleter />
    <footer class="container">
        <div class="row">
            <div class="col-12 col-md-7 d-flex flex-column justify-content-center">
                <h3><strong class="text-title">Nosso endereço</strong></h3>
                @isset($settings['endereco'])
                    <p class="pt-4 pb-3">
                        {!! $settings['endereco'] !!}
                    </p>
                @endisset
                <h3><strong class="text-title">Siga-nos</strong></h3>
                <ul class="nav d-flex justify-content-between pb-5 pt-2">
                    @isset($settings['facebook'])
                        <li class="nav-item">
                            <a class="nav-link p-0 pt-2" href="{{ $settings['facebook'] }}">
                                <img src="{{ asset('images/icons/facebook-grey.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                            </a>
                        </li>
                    @endisset
                    @isset($settings['instagram'])
                    <li class="nav-item">
                        <a class="nav-link p-2" href="{{ $settings['instagram'] }}">
                            <img src="{{ asset('images/icons/instagram-grey.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                        </a>
                    </li>
                    @endisset
                    @isset($settings['youtube'])
                    <li class="nav-item">
                        <a class="nav-link p-2" href="{{ $settings['youtube'] }}">
                            <img src="{{ asset('images/icons/youtube-grey.svg') }}" class="nav-link-icons" alt="{{ env('APP_NAME') }}">
                        </a>
                    </li>
                    @endisset
                </ul>
            </div>
            @isset($settings['mapa'])
            <div class="col-12 col-md-5">
                {!! $settings['mapa'] !!}
            </div>
            @endisset
        </div>
        <div class="row">
            <ul class="nav d-flex justify-content-between py-5 w-100 footer">
                <li class="nav-item">
                    <p class="nav-link p-0 pt-2">
                        2020 - Todos os direitos reservados.
                    </p>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" href="https://novam3.com.br">
                        <img src="{{ asset('images/icons/m3.svg') }}" width="80px" alt="{{ env('APP_NAME') }}">
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <p class="nav-link p-2">
                        Desenvolvido por <strong>Nova M3</strong>
                    </p>
                </li>
            </ul>
        </div>
    </footer>
    @if (!Route::is('product'))
        @isset($whatslink)
            <a href="http://https://api.whatsapp.com/send?phone=+55{{ $whatslink }}&text=Oi!" class="whatslink">
                <img src="{{ asset('images/icons/whatslink.svg') }}" alt="whatsapp">
            </a>
        @endisset
    @endif
    <script src="{{ mix('js/app.js') }}"></script>
    {{ @$js }}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if(session('success'))
            Swal.fire(
                'Sucesso',
                '{!! session('success') !!}',
                'success'
                
            )
        @endif

        @if(session('error'))
            Swal.fire(
                'Erro!',
                '{!! session('error') !!}',
                'error',
            )
        @endif
    </script>
</body>
</html>