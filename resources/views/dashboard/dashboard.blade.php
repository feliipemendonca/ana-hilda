<x-dashboard>
    <x-slot name="title">{{ __('Bem vindo') }}</x-slot>
    <x-slot name="header">
        {{--  @include('layouts.headers.cards')  --}}
    </x-slot>
    <x-slot name="content">        
        <div class="container-fluid mt--7">
            <div class="row">
                
            </div>
        </div>
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    </x-slot>
</x-dashboard>