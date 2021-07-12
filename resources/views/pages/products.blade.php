<x-layout>
    <x-slot name="title">{{ $title = (String)$item->title }}</x-slot>
    @slot('css')
        <style>
            .paginate nav{
                display: flex;
                width: 100%;
                justify-content: space-between;
            }
        </style>
    @endslot
    @php
        $color = "bg-green";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="pages container py-5">
            <div class="row tabs">
                @foreach ($items->lazy() as $value)
                    <div class="col-12 col-md-4 col-lg-3">
                        <x-cardproduct :item="$value"/>
                    </div>
                @endforeach
            </div>
            <div class="row paginate d-flex justify-content-between py-5">
                {{ $items->links() }}
            </div>
        </section>
    </x-slot>
</x-layout>