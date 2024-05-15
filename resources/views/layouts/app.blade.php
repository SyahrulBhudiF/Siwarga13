<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Siwarga13</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen {{$data['menu'] != 'index' ? 'overflow-x-hidden' : 'overflow-hidden'}} flex">
{{--SideBar--}}
<aside class="2xl:w-[18%] xl:w-[20%] lg:w-[24%] lg:block hidden h-full">
    <nav
            class="flex flex-col h-full top-0 left-0 2xl:w-[18%] xl:w-[20%] lg:w-[24%] bg-Primary/20 gap-3 p-4 fixed border-r border-r-Neutral/30">
        @include('layouts.sidebar')
    </nav>
</aside>
<section
        class="2xl:w-[82%] xl:w-[80%] lg:w-[76%] justify-center bg-Neutral/10 w-full h-full relative">
    {{--Header--}}
    @include('layouts.header')
    {{--Content--}}
    <main class="flex flex-col gap-5 py-6 px-5 h-full">
        <div class="h-[81vh] flex flex-col gap-5">
            @yield('content')
        </div>
    </main>
</section>
@stack('js')
<script>
    // Function to toggle the visibility of the dropdown
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.toggle("hidden");
    }

    // Event listener to close the dropdown when clicking outside of it
    window.addEventListener("click", function (event) {
        const dropdown = document.getElementById("dropdownMenu");
        const button = document.getElementById("dropdownButton");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>
</body>
</html>
