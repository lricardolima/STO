<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    @yield('content')


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap/popper.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
