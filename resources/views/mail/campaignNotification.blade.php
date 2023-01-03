@component('mail::message')

@component('mail::panel')
# {{$name}}, Congratulation! Your product is seleted to "{{Str::title($campaignName)}} Campaign" !

Product Name: {{$productName}}

Now, Your product is visible on our "{{Str::title($campaignName)}}"this campaign section.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
