<x-layout>
    <x-slot name="title">{{ $title = (String)$item->title }}</x-slot>
    <x-slot name="head">
        <meta name="description" content="{{ strip_tags(Str::limit($item->description,50)) }}">
        <meta name="subject" content="{{ strip_tags(Str::limit($item->description,50)) }}">
	    <meta name="abstract" content="{{ strip_tags(Str::limit($item->description,50)) }}">
	    <meta name="topic" content="{{ strip_tags(Str::limit($item->description,50)) }}">
	    <meta name="summary" content="{{ strip_tags(Str::limit($item->description,50)) }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:image" content="{{ Storage::url($item->files->filename) }}">
        <meta property="og:image:height" content="340">
        <meta property="og:image:width" content="500">
        <meta property="og:image:type" content="image/jpeg">	
        <meta property="og:site_name" content="{{ env('APP_NAME') }}">
        <meta property="og:locale" content="pt_BR">

        <meta itemprop="name" content="{{ env('APP_NAME') }}">
        <meta itemprop="description" content="{{ strip_tags(Str::limit($item->description,50)) }}">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="{{ Request::url() }}">
        
        <meta name="twitter:url" content="{{ Request::url() }}">
        <meta name="twitter:title" content="{{ env('APP_NAME') }}">
        <meta name="twitter:description" content="{{ strip_tags(Str::limit($item->description,50)) }}">
        <meta name="twitter:image" content="{{ Storage::url($item->files->filename) }}">
    </x-slot>

    @php
        $color = "bg-blue";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="pages container py-5">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-6">
                    @if ($item->gallery)
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ Storage::url($item->files->filename) }}" class="img-fluid w-100" alt="{{ $item->title }}">
                                </div>
                                @foreach ($item->gallery->files as $file)
                                    <div class="carousel-item">
                                        <img src="{{ Storage::url($file->filename) }}" class="d-block w-100" alt="{{ $item->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #00537B;"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #00537B;"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <img src="{{ Storage::url($item->files->filename) }}" class="img-fluid w-100" alt="{{ $item->title }}">
                    @endif
                    
                </div>
                <div class="col-12 col-md-8 col-lg-6 d-flex justify-content-center flex-column">
                    <p>Tipo do Imovél: {{ $item->type->title }}</p>
                    <p>Quartos: {{ $item->room }}</p>
                    <p>Suítes: {{ $item->suite }}</p>
                    <p>Banheiros: {{ $item->restroom }}</p>
                    <p>Vaga Garagem: {{ $item->vacany }}</p>
                    <p>Aréa Util: {{ $item->useful_area }}</p>
                    <p>Aréa Total: {{ $item->total_area }}</p>
                    <p>Andar: {{ $item->walk }}</p>
                    <p>Condomínio: {{ $item->condominium }}</p>
                    <p>IPTU: {{ $item->iptu }}</p>
                    @isset($item->hasOptionals)
                    <p>Características do imóvel:</p>
                        <ul>
                        @foreach ($item->hasOptionals as $has)
                            <li>{{ $has->optional->title }}</li>
                        @endforeach
                        </ul>
                    @endisset
                    @isset($item->value)
                        <h1 class="py-2 text-green">
                            R$ {{ $item->value }}
                        </h1>
                    @endisset                    
                </div>
                <div class="col-12">
                    {!! $item->about !!}
                </div>
            </div>
        </section>

        @isset($whatslink)
            <a href="http://https://api.whatsapp.com/send?phone=+55{{ $whatslink }}&text=Oi, estou interessado. {{ route('product',['slug' => $item->slug]) }}" class="whatslink">
                <img src="{{ asset('images/icons/whatslink.svg') }}" alt="whatsapp">
            </a>
        @endisset
    </x-slot>
</x-layout>