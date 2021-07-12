<article class="tabs pb-5">
    <div class="container">
        <nav>
            <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                @foreach ($items as $value)                    
                    <button class="nav-link text-title pb-1{{ $loop->first ? ' active' : '' }} " id="nav-{{$value->id}}-tab" 
                        data-bs-toggle="tab" data-bs-target="#nav-{{$value->id}}" type="button" role="tab" aria-controls="nav-{{$value->id}}" aria-selected="{{ $loop->first ? true : false }}">
                        {{ $value->title }}
                    </button>
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach ($items as $value)
                <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="nav-{{ $value->id }}" role="tabpanel" aria-labelledby="nav-{{ $value->id }}-tab">
                    <div class="row">
                        @foreach ($value->products->lazy() as $item)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 pt-4">
                                <x-cardproduct :item="$item" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</article>