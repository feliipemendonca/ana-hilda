<section class="blog mt-5 py-5">
    <div class="container py-5">
        <h1 class="text-center text-title w-100">
            <strong>{{ Route::is('blog') ? 'Outras publicações' : 'Conheça o nosso blog!' }}</strong>
        </h1>
        <div class="row pt-3">
            @foreach ($items->lazy() as $item)
                <div class="col-12 col-md-4 pt-3">
                    <x-cardblog :item="$item" />
                </div>
            @endforeach
        </div>
        <div class="row card-footer border-0 pt-5">
            <a href="{{ route('blogs') }}" class="text-center">Ver mais <span>></span></a>
        </div>
    </div>
</section>