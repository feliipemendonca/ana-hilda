<x-layout>
    <x-slot name="title">{{ $title = $item->title }}</x-slot>
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
        $color = "bg-white";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="blog bg-white">
            <div class="container">
                <div class="col-12">
                    <img src="{{ asset($item->files->filename) }}" class="img-fluid w-100" alt="{{ $item->title }}">
                    <div class="py-4">
                        {!! $item->description !!}
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end pb-5">
                    <p style="color: #7A7A7A">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                </div>
            </div>
        </section>
        <x-blog :items="$blogs"/>
    </x-slot>
</x-layout>