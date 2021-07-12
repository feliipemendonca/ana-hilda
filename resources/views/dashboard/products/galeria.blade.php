<x-dashboard>
    <x-slot name="title">{{ __('Produtos / Galeria / '. $item->title) }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <style>
            .gallery {
                height: 200px;
            }

        </style>
    </x-slot>
    <x-slot name="content">
        <div class=" container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Lista</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="javascript:history.back();" class="btn btn-danger btn-sm">Voltar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12"></div>

                        <div class="card-body">
                            <form method="post" action="{{ route('m3.galeria') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </form>
                            <div class="row pt-5">
                                @isset($item->gallery)
                                    @foreach ($item->gallery->files as $file)
                                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 pb-4">
                                            @livewire('delete', ['route' => route('m3.deletegallery',$file)],key($file->id))
                                            <img src="{{ Storage::url($file->filename) }}" class="w-100 img-fluid gallery"
                                                data-dz-remove>
                                        </div>
                                    @endforeach
                                @endisset                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFilesize: 1,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file) {
                    var name = file.upload.filename;
                    var id = {{ $item['id'] }}
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'GET',
                        url: '{{ route('m3.galeria') }}',
                        data: {
                            filename: name, id: id
                        },
                        success: function(data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response) {
                    alert('error')
                }
            }

    </script>
    </x-slot>
</x-dashboard>
