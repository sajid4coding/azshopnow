@component('mail::message')

@component('mail::panel')
# {{$name}}, Congratulation! Your account is activated!

Shop Name: {{$shop_name}}

Now, you can start your business.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
