<x-dashboard>
    <x-slot name="title">{{ __('Produtos / Adicionar') }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
        <link rel="stylesheet" href="{{ asset('argon/css/custom_select.css') }}">
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="card w-100">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="mb-0">Descrição</h3>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <a href="javascript:history.back();" class="btn btn-danger btn-sm">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <x-form action="{{ route('m3.products.store') }}" has-files>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <x-label for="Título" />
                                                <x-input name="title" class="form-control"
                                                    value="{{ old('title') }}" />
                                                <x-error field="title" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <x-label for="Código" />
                                                <x-input type="tel" name="cod" class="form-control"
                                                    value="{{ old('cod') }}" />
                                                <x-error field="cod" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <x-label for="Valor" />
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <small class="font-weight-bold">R$</small></span>
                                                    </div>
                                                    <x-input type="tel" name="value" class="form-control money"
                                                        value="{{ old('value') }}" />
                                                </div>
                                                <x-error field="value" class="text-danger" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-12">
                                            <h3>Sobre o imóvel</h3>
                                            <hr>
                                        </div>
                                        <div class="col-12 col-lg-4 pt-3">
                                            <x-label for="Tipo de imóvel" />
                                            <select name="type_products_id" class="form-control js-example-basic ">
                                                <option value="">Tipo de imóvel</option>
                                                @foreach ($type as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('type_products_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                            <x-error field="type_products_id" class="text-danger" />
                                        </div>
                                        <div class="col-12 col-lg-4 pt-3">
                                            <x-label for="Categoria" />
                                            <select name="category_products_id" class="form-control js-example-basic ">
                                                <option value="">Categoria</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('category_products_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                            <x-error field="category_products_id" class="text-danger" />
                                        </div>
                                        <div class="col-12 col-lg-4 pt-3">
                                            <x-label for="Interesse" />
                                            <select name="location_products_id" class="form-control js-example-basic ">
                                                <option value="">Interesse</option>
                                                @foreach ($location as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('location_products_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                            <x-error field="location_products_id" class="text-danger" />
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 pt-3">
                                            <div class="form-group">
                                                <x-label for="Quartos" />
                                                <select name="room" class="form-control js-example-basic ">
                                                    @for ($i = 0; $i < 51; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('room') == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-error field="room" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 pt-3">
                                            <div class="form-group">
                                                <x-label for="Suítes" />
                                                <select name="suite" class="form-control js-example-basic ">
                                                    @for ($i = 0; $i < 51; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('suite') == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-error field="suite" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 pt-3">
                                            <div class="form-group">
                                                <x-label for="Banheiro" />
                                                <select name="restroom" class="form-control js-example-basic ">
                                                    @for ($i = 0; $i < 51; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('restroom') == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-error field="restroom" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 pt-3">
                                            <div class="form-group">
                                                <x-label for="Vaga" />
                                                <select name="vacany" class="form-control js-example-basic ">
                                                    @for ($i = 0; $i < 51; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('vacany') == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-error field="vacany" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 pt-3">
                                            <div class="form-group">
                                                <x-label for="Aréa Util" />
                                                <div class="input-group input-group-merge">
                                                    <x-input type="tel" class="form-control" name="useful_area"
                                                        value="{{ old('useful_area') }}" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <small class="font-weight-bold">m²</small></span>
                                                    </div>
                                                </div>
                                                <x-error field="useful_area" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 pt-3">
                                            <div class="form-group">
                                                <x-label for="Aréa Total" />
                                                <div class="input-group input-group-merge">
                                                    <x-input type="tel" class="form-control" name="total_area"
                                                        value="{{ old('total_area') }}" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <small class="font-weight-bold">m²</small></span>
                                                    </div>
                                                </div>
                                                <x-error field="total_area" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 pt-3">
                                            <div class="form-group">
                                                <x-label for="Andar" />
                                                <select name="walk" class="form-control js-example-basic ">
                                                    @for ($i = 0; $i < 51; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('walk') == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <x-error field="walk" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col-12 pt-3">
                                            <div class="form-group">
                                                <x-label for="Sobre" />
                                                <x-textarea name="about" class="form-control">
                                                    {{ old('about') }}
                                                </x-textarea>
                                                <x-error field="about" class="text-danger" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-5">
                                        <div class="col-12">
                                            <h3>Características do imóvel</h3>
                                            <hr>
                                        </div>
                                        @foreach ($optionals as $item)
                                            <div class="col-12 col-lg-4">
                                                <p><strong>{{ $item->title }}</strong></p>
                                                @foreach ($item->optionals()->orderBy('title','asc')->get() as $op)
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input  class="form-check-input" type="checkbox" name="optional[]" {{ old('optional[]') ? 'checked' : ' false'}} value="{{ $op->id }}">
                                                        <x-label class="form-check-label" for="{{ $op->title }}" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row pt-5">
                                        <div class="col-12">
                                            <h3>Localização do imóvel</h3>
                                            <hr>
                                        </div>
                                        <div class="col-12 col-lg-4 pt-3">
                                             <x-label for="Estado" /> 
                                            <select name="estado" id="states" class="js-example-basic form-control">
                                                <option value="">Selecione seu Estado</option>
                                                @foreach ($states as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('estado') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->titulo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-error field="estado" class="text-danger" />
                                        </div>
                                        <div class="form-group col-12 col-lg-4 pt-3">
                                            <x-label for="Cidade" />
                                            <select name="cidade" id="city" class="js-example-basic form-control"
                                                required>
                                                <option value="">Selecione Cidade</option>
                                            </select>
                                            <x-error field="cidade" class="text-danger" />
                                        </div>
                                        <div class="form-group col-12 col-lg-4 pt-3">
                                            <x-label for="Bairro" />
                                            <select name="bairro" id="districts"
                                                class="js-example-basic form-control">
                                                <option value="">Selecione Bairro</option>
                                            </select>
                                            <x-error field="bairro" class="text-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group d-flex flex-column">
                                        <label for="Imagem">Imagem</label>
                                        <div class="custom-file">
                                            <x-input name="file" class="custom-file-input" type="file"
                                                id="input-image" />
                                            <label class="custom-file-label" for="customFileLang">Selecione
                                                Imagem</label>
                                        </div>

                                        <img id="imagem" class="img-fluid" src="">
                                        <x-error field="file" class="text-danger" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </nav>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>
