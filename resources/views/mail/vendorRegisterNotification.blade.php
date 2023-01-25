@component('mail::message')

@component('mail::panel')
# One New Shop is Opened.

Shop Name: <b>{{$shop_name}}</b>

@endcomponent

{{ config('app.name') }}
@endcomponent
