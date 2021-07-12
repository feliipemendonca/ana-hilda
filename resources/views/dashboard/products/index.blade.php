<x-dashboard>
    <x-slot name="title">{{ __('Produtos') }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="content"> 
        <div class="container-fluid mt--7">
            <div class="row">
                @livewire('products')
            </div>
            <div class="row mt-5">

            </div>
        </div>
    </x-slot>
</x-dashboard>