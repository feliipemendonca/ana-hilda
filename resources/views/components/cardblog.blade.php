<div class="card border-0 bg-white">
    <img src="{{ asset($item->files->filename) }}" class="img-fluid w-100" alt="{{ $item->title }}">
    <div class="card-header p-0 bg-white border-0 m-0 d-flex justify-content-center">
        <hr>
    </div>
    <div class="card-body">                            
        <h5 class="card-title text-title">
            <strong>{{ $item->title }}</strong>
        </h5>                            
        <div class="card-text">{!! Str::limit($item->description, 150) !!}</div>
    </div>
    <div class="card-footer bg-white d-flex justify-content-end border-0">
        <a href="{{ route('blog',$item->slug) }}">Ler mais! <span>></span></a>
    </div>
</div>