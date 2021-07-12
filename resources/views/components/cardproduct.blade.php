<a href="{{ route('product',['slug' => $item->slug]) }}" class="card border-0 rounded-0" 
    style="background-image: linear-gradient(#00000000, #000000a6), 
        url({{ Storage::url($item->files->filename) }})">
    <div class="card-body pt-5">
        <div class="pt-5">
            <hr>
            <h6 class="card-title"><strong>{{ $item->title }}</strong></h6>
            <h4 class="card-subtitle mb-2">Card subtitle</h4>
        </div>
    </div>
</a>