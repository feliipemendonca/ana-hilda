<x-layout>
    <x-slot name="title">{{ $title = 'Blog da Ana Hilda' }}</x-slot>
    @php
        $color = "bg-white";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="blog bg-white">
            <div class="container">
                <div class="row">
                    @foreach ($items->lazy() as $item)
                        @if ($loop->first)
                            <div class="col-12">
                                <div class="card mb-3 border-0 bg-white blog-card">
                                    <div class="row g-0">
                                        <div class="col-12 d-md-none">
                                            <h1 class="card-title pb-3">{{ $item->title }}</h1>
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                                            <img src="{{ $item->files->filename }}" class="img-fluid w-100" alt="{{ $item->title }}">
                                        </div>
                                        <div class="col-md-6 col-lg-7 ps-lg-3 d-flex justify-content-center align-content-center flex-column">
                                            <div class="card-body d-flex justify-content-center align-content-center flex-column">
                                                <div class="card-date text-gray">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                                <h1 class="card-title d-none d-md-block">{{ $item->title }}</h1>
                                                <div class="card-text">{!! Str::limit($item->description,200) !!}</div>
                                            </div>
                                            <div class="card-footer bg-white d-flex justify-content-end border-0">
                                                <a href="{{ route('blog',$item->slug) }}">Ler mais! <span>></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12 col-md-4 pt-3">
                                <div class="pt-3">
                                    <x-cardblog :item="$item"/>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row blog-paginate py-5">
                    {{ $items->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </section>
    </x-slot>
</x-layout>