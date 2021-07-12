@component('mail::message')
# Olá

Novo newslleter através do site

#E-mail: {{ $newslleter }}


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
