@component('mail::message')
# Olá

Novo contato através do site. Clique no botão abaixo para visualizar

@component('mail::button', ['url' => route('m3.contacts.show',$contact->id)])
Visualizar
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
