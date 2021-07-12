<section class="newslleter py-5 mb-5">
    <div class="container">
        <div class="row g-3 w-100 pt-3 pt-md-0">
            <div class="col-12 col-md-7 d-flex align-items-center">
                <h3><strong>Fique por dentro de nossas novidades!</strong></h3>
            </div>
            <div class="col-12 col-md-5 p-md-0">
                <x-form action="{{ route('newslleter') }}">
                    <div class="row">
                        <div class="col col-md-10 col-lg">
                            <x-input placeholder="Digite aqui o seu e-mail" name="email" type="email" class="form-control rounded-pill border-0" />
                            <x-error field="email" class="text-white" />
                        </div>
                        <div class="col-2 col-md-2 col-lg-1">
                            <button type="submit" class="btn btn-success rounded-pill border-0 d-flex justify-content-center p-0">
                                <img src="{{ asset('images/icons/seta.svg') }}" alt="">
                            </button>
                        </div>
                    </div>
                </x-form>                    
            </div>
        </div>
    </div>
</section>