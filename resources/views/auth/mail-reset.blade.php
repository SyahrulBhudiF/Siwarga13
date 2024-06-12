<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    @vite('resources/css/app.css')
    <title>Reset Password</title>
</head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<body class="w-screen h-screen relative overflow-hidden flex justify-center items-center bg-[#F5F7F9]">
<main
    class="2xl:w-[28%] lg:w-[37%] max-sm:w-[95%] max-lg:w-[70%] z-10 bg-white p-10 flex flex-col items-center justify-center gap-8 border border-Neutral/30 rounded-[1.25rem] shadow">
    <header class="flex flex-col gap-8 w-full">
        <p class="text-Primary/10 font-medium  text-xl">Siwarga13</p>
        <p class="text-Neutral/100 text-4xl max-sm:text-3xl font-medium">Silahkan klik link berikut untuk melakukan
            reset password anda</p>
    </header>
    <a href="{{ url('/forgot-password/' . $token) }}">Klik Disini</a>
</main>
</body>
</html>
