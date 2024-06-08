<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Login Page">
    <link rel="icon" href="{{asset('svg/Logo.svg')}}">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="w-screen h-screen relative overflow-hidden flex justify-center items-center bg-[#F5F7F9]">
@if(session('success') || session('error'))
    <x-flash-message></x-flash-message>
@endif
<div id="particles-js" class="absolute z-0 w-full h-full"></div>
<script src="{{ asset('js/particles.js') }}"></script>
<script src="{{ asset('js/configParticles.js') }}"></script>
<main
    class="2xl:w-[28%] lg:w-[37%] max-sm:w-[95%] max-lg:w-[70%] z-10 bg-white p-10 flex flex-col items-center justify-center gap-8 border border-Neutral/30 rounded-[1.25rem] shadow">
    <header class="flex flex-col gap-8 w-full">
        <p class="text-Primary/10 font-medium  text-xl">Siwarga13</p>
        <p class="text-Neutral/100 text-4xl max-sm:text-3xl font-medium">{{session('success') == 'Login Berhasil!'? 'Selamat Datang di Website Sistem Informasi Siwarga 13 👋' : 'Selamat Datang!'}}</p>
        @if(session('success') == 'Login Berhasil!')
            <x-buttons.primary-button href="{{auth()->user()->role != 'RW' ? '/warga' : '/beranda'}}">Lanjutkan
            </x-buttons.primary-button>
        @endif
    </header>
    @if(!session('success') == 'Login Berhasil!' || session('success') == 'Logout Berhasil!')
        <form action="{{route('login.auth')}}" method="post" class="w-full flex flex-col gap-3">
            @csrf
            <x-input.text-input label="username" id="username" value="" placeholder="Masukkan username anda">Username
            </x-input.text-input>
            <label class="flex flex-col gap-2 w-full" for="">
                <span class="text-Neutral/100 text-sm font-medium">Password</span>
                <div class="relative w-full">
                    <input type="password"
                           class="outline-none w-full border border-Neutral/30 rounded-[1.25rem] px-4 py-2 focus:border-Primary/10 focus:text-Primary/10"
                           id="password" name="password" placeholder="Masukkan password anda">
                    {{--SVG OPEN--}}
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none"
                         class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer"
                         onclick="togglePassword()">
                        <path
                            d="M15.58 12C15.58 13.98 13.98 15.58 12 15.58C10.02 15.58 8.42004 13.98 8.42004 12C8.42004 10.02 10.02 8.41998 12 8.41998C13.98 8.41998 15.58 10.02 15.58 12Z"
                            stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.46997 3.71997 5.17997 5.79997 2.88997 9.39997C1.98997 10.81 1.98997 13.18 2.88997 14.59C5.17997 18.19 8.46997 20.27 12 20.27Z"
                            stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{--SVG Close--}}
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none"
                         class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer hidden"
                         onclick="togglePassword()">
                        <path
                            d="M9.46992 15.2799C9.27992 15.2799 9.08992 15.2099 8.93992 15.0599C8.11992 14.2399 7.66992 13.1499 7.66992 11.9999C7.66992 9.60992 9.60992 7.66992 11.9999 7.66992C13.1499 7.66992 14.2399 8.11992 15.0599 8.93992C15.1999 9.07992 15.2799 9.26992 15.2799 9.46992C15.2799 9.66992 15.1999 9.85992 15.0599 9.99992L9.99992 15.0599C9.84992 15.2099 9.65992 15.2799 9.46992 15.2799ZM11.9999 9.16992C10.4399 9.16992 9.16992 10.4399 9.16992 11.9999C9.16992 12.4999 9.29992 12.9799 9.53992 13.3999L13.3999 9.53992C12.9799 9.29992 12.4999 9.16992 11.9999 9.16992Z"
                            fill="#292D32"/>
                        <path
                            d="M5.60009 18.51C5.43009 18.51 5.25009 18.45 5.11009 18.33C4.04009 17.42 3.08009 16.3 2.26009 15C1.20009 13.35 1.20009 10.66 2.26009 8.99998C4.70009 5.17998 8.25009 2.97998 12.0001 2.97998C14.2001 2.97998 16.3701 3.73998 18.2701 5.16998C18.6001 5.41998 18.6701 5.88998 18.4201 6.21998C18.1701 6.54998 17.7001 6.61998 17.3701 6.36998C15.7301 5.12998 13.8701 4.47998 12.0001 4.47998C8.77009 4.47998 5.68009 6.41998 3.52009 9.80998C2.77009 10.98 2.77009 13.02 3.52009 14.19C4.27009 15.36 5.13009 16.37 6.08009 17.19C6.39009 17.46 6.43009 17.93 6.16009 18.25C6.02009 18.42 5.81009 18.51 5.60009 18.51Z"
                            fill="#292D32"/>
                        <path
                            d="M12.0001 21.02C10.6701 21.02 9.37006 20.75 8.12006 20.22C7.74006 20.06 7.56006 19.62 7.72006 19.24C7.88006 18.86 8.32006 18.68 8.70006 18.84C9.76006 19.29 10.8701 19.52 11.9901 19.52C15.2201 19.52 18.3101 17.58 20.4701 14.19C21.2201 13.02 21.2201 10.98 20.4701 9.81C20.1601 9.32 19.8201 8.85 19.4601 8.41C19.2001 8.09 19.2501 7.62 19.5701 7.35C19.8901 7.09 20.3601 7.13 20.6301 7.46C21.0201 7.94 21.4001 8.46 21.7401 9C22.8001 10.65 22.8001 13.34 21.7401 15C19.3001 18.82 15.7501 21.02 12.0001 21.02Z"
                            fill="#292D32"/>
                        <path
                            d="M12.6901 16.2699C12.3401 16.2699 12.0201 16.0199 11.9501 15.6599C11.8701 15.2499 12.1401 14.8599 12.5501 14.7899C13.6501 14.5899 14.5701 13.6699 14.7701 12.5699C14.8501 12.1599 15.2401 11.8999 15.6501 11.9699C16.0601 12.0499 16.3301 12.4399 16.2501 12.8499C15.9301 14.5799 14.5501 15.9499 12.8301 16.2699C12.7801 16.2599 12.7401 16.2699 12.6901 16.2699Z"
                            fill="#292D32"/>
                        <path
                            d="M1.99994 22.7502C1.80994 22.7502 1.61994 22.6802 1.46994 22.5302C1.17994 22.2402 1.17994 21.7602 1.46994 21.4702L8.93994 14.0002C9.22994 13.7102 9.70994 13.7102 9.99994 14.0002C10.2899 14.2902 10.2899 14.7702 9.99994 15.0602L2.52994 22.5302C2.37994 22.6802 2.18994 22.7502 1.99994 22.7502Z"
                            fill="#292D32"/>
                        <path
                            d="M14.53 10.2199C14.34 10.2199 14.15 10.1499 14 9.99994C13.71 9.70994 13.71 9.22994 14 8.93994L21.47 1.46994C21.76 1.17994 22.24 1.17994 22.53 1.46994C22.82 1.75994 22.82 2.23994 22.53 2.52994L15.06 9.99994C14.91 10.1499 14.72 10.2199 14.53 10.2199Z"
                            fill="#292D32"/>
                    </svg>
                </div>
            </label>
            <button type="submit"
                    class="bg-Neutral/30 text-white font-medium mt-4 rounded-[1.25rem] buttonAnimation py-2 transition duration-200 w-full hover:brightness-95">
                Masuk
            </button>
        </form>
    @endif
</main>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('input');
        const submitButton = document.querySelector('button[type="submit"]');

        const checkInputs = () => {
            const allFilled = Array.from(inputs).every(input => input.value.trim());

            if (allFilled) {
                submitButton.removeAttribute('disabled');
                submitButton.classList.remove('bg-Neutral/30', 'pointer-events-none');
                submitButton.classList.add('bg-Primary/10');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
                submitButton.classList.remove('bg-Primary/10');
                submitButton.classList.add('bg-Neutral/30', 'pointer-events-none');
            }
        };

        inputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        checkInputs();
    });

    const togglePassword = () => {
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            passwordInput.type = "password";
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
    };
</script>
</body>
</html>
