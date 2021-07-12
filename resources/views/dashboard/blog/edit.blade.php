<x-dashboard>
    <x-slot name="title">{{ __('Blog / Adicionar') }}</x-slot>
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
                                <h3 class="mb-0">Adicionar</h3>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <a href="javascript:history.back();" class="btn btn-danger btn-sm">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <x-form action="{{ route('m3.blog.update',$item) }}" has-files>
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="form-group">
                                        <x-label for="Title" />
                                        <x-input name="title" class="form-control" value="{{ $item->title }}" />
                                        <x-error field="title" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Conteúdo" />
                                        <x-textarea name="description" class="form-control" id="content">{{ $item->description }}</x-textarea>
                                        <x-error field="description" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <x-label for="Imagem" />
                                        <x-input name="file" type="file" id="input-image"/>
                                        <img id="imagem" class="img-fluid" src="{{ Storage::url($item->files->filename) }}">
                                        <x-error field="file" />
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
    <x-slot name="js">
        <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
        <script src="{{ asset('argon/js/default.js') }}"></script>
    </x-slot>
</x-dashboard>