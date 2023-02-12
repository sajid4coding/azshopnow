@component('mail::message')

@component('mail::panel')
# New Product Return request.

Product Name: <b>{{$name}}</b>

Checkout product return page
@endcomponent

{{ config('app.name') }}
@endcomponent
