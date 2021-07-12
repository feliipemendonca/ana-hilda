<x-dashboard>
    <x-slot name="title">{{ __('Configurações/ Editar /'. $item->title) }}</x-slot>
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
                                <h3 class="mb-0">Editar</h3>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <a href="javascript:history.back();" class="btn btn-danger btn-sm">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <x-form action="{{ route('m3.settings.update',$item) }}">
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <x-label for="Title" />
                                        <x-input name="title" class="form-control" value="{{ $item->title }}" />
                                        <x-error field="title" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <x-label for="Descrição" />
                                        <x-textarea name="description" class="form-control">{{ $item->description }}</x-textarea>
                                        <x-error field="description" class="text-danger" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </nav>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>