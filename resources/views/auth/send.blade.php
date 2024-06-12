<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Login Page">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" href="{{ asset('svg/Logo.svg') }}">
    @vite('resources/css/app.css')
    <title>Send link to email</title>
</head>

<body class="w-screen h-screen relative overflow-hidden flex justify-center items-center bg-[#F5F7F9]">
    @if (session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div id="particles-js" class="absolute z-0 w-full h-full"></div>
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/configParticles.js') }}"></script>
    <main
        class="2xl:w-[28%] lg:w-[37%] max-sm:w-[95%] max-lg:w-[70%] z-10 bg-white p-10 flex flex-col items-center justify-center gap-8 border border-Neutral/30 rounded-[1.25rem] shadow">
        <header class="flex flex-col gap-8 w-full">
            <p class="text-Primary/10 font-medium  text-xl">Siwarga13</p>
            <p class="text-Neutral/100 text-4xl max-sm:text-3xl font-medium">Masukkan email anda</p>
        </header>
        <form action="{{ route('sendEmail') }}" method="post" class="w-full flex flex-col gap-3">
            @csrf
            <x-input.text-input label="email" id="email" value="" placeholder="Masukkan email anda">Email
            </x-input.text-input>
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit"
                class="bg-Neutral/30 text-white font-medium mt-4 rounded-[1.25rem] buttonAnimation py-2 transition duration-200 w-full hover:brightness-95">
                Submit
            </button>
        </form>
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
    </script>
</body>

</html>
