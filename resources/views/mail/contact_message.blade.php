{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
</head>
<body style="background: #313131;padding:50px 50px;border-radius:5px;">
     <h4 style="color: #ffffff;margin:0;padding:0;font-size:16px;font-weight:400">Name: <span style="margin-left:10px;color:#dbdbdb">{{ $messageInfo['name'] }}</span></h4>
     <h6 style="color:#ffffff;margin:0;padding:5px 0 0 0;font-size:16px;font-weight:400">Email: <span style="margin-left:10px;color:#4099ff">{{ $messageInfo['email'] }}</span></h6>
     <p style="color: #dbdbdb;margin:0;padding:50px 0 0 0;font-size:16px;font-weight:400"> {{ $messageInfo['message'] }}</p>

</body>
</html> --}}
@component('mail::message')

@component('mail::panel')
# Email: {{ $messageInfo['email'] }}
# Name: {{ $messageInfo['name']}}
# Message: {{ $messageInfo['message']}}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
