<x-dashboard>
    <x-slot name="title">{{ __('Contatos / Ver / '. $item->name) }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="content"> 
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="card w-100">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="mb-0">Contato</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <x-label for="Title" />
                                    <p>{{ $item->name }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <x-label for="E-mail" />
                                    <p>{{ $item->email }}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <x-label for="Mensagem" />
                                    <p>{{ $item->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <a href="{{ route('m3.contacts.index') }}" type="submit" class="btn btn-danger">Voltar</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>