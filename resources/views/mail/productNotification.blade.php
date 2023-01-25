@component('mail::message')

@component('mail::panel')
# One New Product is Uploaded.

Product Name: <b>{{$productName}}</b>

Check the product with <b>{{ config('app.name') }}</b> Terms and Condition, Then published the product.
@endcomponent

{{ config('app.name') }}
@endcomponent
