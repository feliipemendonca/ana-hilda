<x-layout>
    <x-slot name="title">{{ __('Inicio') }}</x-slot>
    <x-slot name="content">
        <x-slides :items="$slides" />
        <article class="container form py-5">
            <h1 class="py-2">
                <strong class="text-title">Encontre o seu imóvel agora!</strong>
            </h1>
            <x-form method="get" action="{{ route('search') }}" class="pb-5">
                <select name="type" class="btn btn-success text-uppercase px-5 rounded-0 border-0">
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="row g-3 w-100 pt-3 pt-md-0">
                    <div class="col-12 col-md-3 pe-md-0">
                        <select name="category" class="form-control bg-white rounded-0">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4 p-md-0">
                        <select name="location" class="form-control bg-white rounded-0">
                            @foreach ($locations as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-5 p-md-0">
                        <div class="row">
                            <div class="col-12 col-md-10 col-lg p-md-0">
                                <select name="" class="form-control bg-white rounded-0">
                                    <option value="">bairro ou cidade</option>
                                    <option value="">selecte</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2 col-lg form-button pt-3 p-md-0">
                                <button type=submit"
                                    class="btn btn-success w-100 rounded-0 border-0 d-flex align-items-center justify-content-center">
                                    <span class="d-md-none px-2">Pesquisar</span>
                                    <img src="{{ asset('images/icons/lupa.svg') }}" alt="lupa">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </article>
        <x-tabproducts :items="$type" />
        <section class="py-5 block-one">
            <div class="row p-0 m-0 w-100">
                <div
                    class="col-12 p-0 col-lg-5 d-flex justify-content-center justify-content-lg-end align-items-center block-one-content py-3">
                    <h1 class="text-uppercase py-5 pe-5"><strong>ANÚNCIE AQUI <br>O SEU IMÓVEL!</strong></h1>
                </div>
                <div class="col-12 p-0 col-lg-7 d-flex align-items-center block-one-content-two py-3">
                    <p class="py-5 ps-5">Anuncie seu imóvel em todo o RN com a equipe com experiência no mercado
                        imobiliário no Estado <br><br><a href="" class="text-uppercase"><strong>anuncie
                                aqui</strong></a></p>
                </div>
            </div>
        </section>
        <section class="block-two pt-3 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center pb-5">
                        <h1 class="text-center">
                            <strong class="text-title">Oportunidades para quem quer vender, alugar ou comprar um imóvel
                                no Rio Grande do Norte.</strong>
                        </h1>
                    </div>
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-12 col-md-4 pt-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-title">
                                        <strong>Card title</strong>
                                    </h5>
                                    <hr>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Perferendis,
                                        deleniti asperiores. Doloremque harum explicabo dolorem quisquam dignissimos.
                                        Ipsam,
                                        laboriosam officiis quisquam accusamus doloremque iste odio deserunt, nostrum id
                                        voluptate
                                        dolorum.
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-end border-0">
                                    <a href="#">Card link ></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        @isset($settings['simulador'])
            <div class="container d-flex justify-content-center py-4 d-flex justify-content-center">
                <a href="{{ $settings['simulador'] }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('images/caixa.png') }}" class="img-fluid" alt="{{ env('APP_NAME') }}">
                </a>
            </div>
        @endisset
        <x-blog :items="$blogs" />
    </x-slot>
</x-layout>
