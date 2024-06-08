<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Landing Page Web Warga RW13">
    <link rel="icon" href="{{asset('svg/Logo.svg')}}">
    <title>Siwarga13</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="w-screen h-screen overflow-x-hidden">
@include('dashboard.layouts.navbar')
@yield('content')
@include('dashboard.layouts.footer')

@stack('js')
</body>
</html>
