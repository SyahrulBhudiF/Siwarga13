<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siwarga13</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen overflow-hidden flex">
{{--SideBar--}}
<aside class="2xl:w-[18%] xl:w-[20%] lg:w-[24%] lg:block hidden h-full">
    <nav class="flex flex-col h-full bg-Primary/20 gap-3 p-4">
        @include('layouts.sidebar')
    </nav>
</aside>
<section
    class="2xl:w-[82%] xl:w-[80%] lg:w-[76%] justify-center bg-Neutral/10 border-l border-l-Neutral/30 w-full h-full">
    {{--Header--}}
    @include('layouts.header')
    {{--Content--}}
    <div class="flex flex-col gap-5 py-6 px-5 h-full">
        <div class="h-[85%] flex flex-col gap-5">
            @yield('content')
        </div>
    </div>
</section>
@stack('js')
</body>
</html>
