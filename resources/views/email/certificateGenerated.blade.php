{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>network academy</title>
</head>
<body>
<h1> Congratulations {{$details['name']}}</h1>


<h3> Your certificate link : <span><a href="{{$details['link']}} "> {{$details['link']}} </a>  </span></h3>


<h3> {{$details['message']}}  </h3>

</body>
</html>