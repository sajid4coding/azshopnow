@component('mail::message')

@component('mail::panel')
# {{$name}}, Congratulation! Your product is approved!

Product Name: {{$productName}}

Now, Your product is visible on our shop page and customer can buy your product.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
