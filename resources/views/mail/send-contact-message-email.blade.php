@component('mail::message')
# Message

Objet: {{ $objet }}

Envoyé par: {{ $email }}

Message: {{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
