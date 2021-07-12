<x-layout>
    <x-slot name="title">{{ $title = (String)$item->title }}</x-slot>
    @php
        $color = "bg-blue";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="pages container py-5">
            @isset($item->files)
                <img src="{{ Storage::url($item->files->filename) }}" class="img-fluid w-100">
            @endisset
            <div class="py-4">
            {!! $item->description !!}
            </div>
        </section>
    </x-slot>
</x-layout>