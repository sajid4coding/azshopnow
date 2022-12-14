@component('mail::message')

@component('mail::panel')
# {{$name}}, We are really Sorry! Your product is Banned temporarily!

Product Name: {{$productName}}

Please, Contact with our support center ASAP.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
