<x-layout>
    <x-slot name="title">{{ $title = 'Entre em contato conosco' }}</x-slot>
    @php
        $color = "bg-green";
    @endphp
    <x-slot name="content">
        <x-layout.title :item="$title" :color="$color" />
        <section class="pages container py-5">
            <x-form action="{{ route('contact') }}">
                <div class="row">
                    <div class="col-12 py-2">
                        <x-input name="name" placeholder="Nome" class="form-control" value="{{ old('name') }}" />
                        <x-error field="name" class="text-danger" />
                    </div>
                    <div class="col-12 col-lg-6 py-2">
                        <x-input name="email" type="email" placeholder="E-mail" class="form-control" value="{{ old('email') }}" />
                        <x-error field="email" class="text-danger" />
                    </div>
                    <div class="col-12 col-lg-6 py-2">
                        <x-input name="phone" placeholder="Telefone" class="form-control sp_celphones" value="{{ old('phone') }}" />
                        <x-error field="phone" class="text-danger" />
                    </div>
                    <div class="col-12 py-2">
                        <x-textarea name="message" placeholder="Mensagem" class="form-control" rows="10">{{ old('name') }}</x-textarea>
                        <x-error field="name" class="text-danger" />
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <button type="submit" class="btn btn-success px-5">Enviar</button>
                </div>
            </x-form>            
        </section>
        <div class="container d-none d-lg-flex justify-content-center pt-3 pb-5">
            <img src="{{ asset('images/caixa.png') }}" class="img-fluid w-75" alt="">
        </div>
        <x-blog :items="$blogs"/>
    </x-slot>
    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
            $('.sp_celphones').mask(SPMaskBehavior, spOptions);
        </script>
    </x-slot>
</x-layout>