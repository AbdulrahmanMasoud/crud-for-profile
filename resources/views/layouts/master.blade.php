<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{url('css/style.css') }}">
</head>
<body>
    @yield('content')

    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/jQuery v3.5.1.js')}}"></script>
</body>
</html>