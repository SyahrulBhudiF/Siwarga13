<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web warga RW13">
    <title>Siwarga13</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen overflow-x-hidden">
@include('dashboard.layouts.navbar')
<section
    class="mt-3 w-full h-full">
    <div
        class="flex gap-8 rounded-[1.25rem] h-[85vh] bg-[#F5F5F3] px-12 py-6 m-3">
        <div class="flex flex-col justify-center gap-8">
            <div class="flex flex-col gap-4 items-stretch">
                <p class="p-3 bg-white rounded-3xl w-fit">👋🏻 Halo, Warga RW 13!</p>
                <p class="font-medium text-Neutral/100 2xl:text-[3.75rem] xl:text-[3rem] lg:text-[2.75rem] 2xl:w-[75%]">
                    Selamat
                    Datang di Portal
                    Informasi RW 13</p>
                <p class="text-xl text-Neutral/90 2xl:w-[80%] xl:w-[85%]">Dapatkan informasi terbaru dan akurat tentang
                    warga, bantuan
                    sosial,
                    dan berbagai layanan komunitas langsung dari satu platform.</p>
                <a href="#pengumuman"
                   class="max-lg:self-start py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Jelajahi</a>
            </div>
            <div class="grid lg:grid-rows-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col justify-between px-5 py-6 2xl:gap-8 gap-4 bg-white rounded-2xl">
                    <div class="flex items-center gap-3">
                        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                            <img src="{{asset('svg/profile.svg')}}" alt="icon" class="w-fit">
                        </div>
                        <p class="font-medium text-Neutral/100 text-xl">Total Warga</p>
                    </div>
                    <p id="warga" class="font-medium text-Neutral/100 text-[2rem]">{{$data['totalWarga']}} Orang</p>
                </div>
                <div class="flex flex-col justify-between px-5 py-6 2xl:gap-8 gap-4 bg-white rounded-2xl">
                    <div class="flex items-center gap-3">
                        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                            <img src="{{asset('svg/card.svg')}}" alt="icon" class="w-fit">
                        </div>
                        <p class="font-medium text-Neutral/100 text-xl">Total KK</p>
                    </div>
                    <p id="kk" class="font-medium text-Neutral/100 text-[2rem] mt-auto">{{$data['totalKK']}} KK</p>
                </div>
            </div>
        </div>
        <div class="flex justify-end overflow-hidden 2xl:w-[60%] w-full relative">
            <img src="{{asset('img/hero.jpg')}}" alt="hero" class="rounded-2xl bg-cover w-full h-full">
            <div class="absolute bottom-1 w-full">
                <div class="bg-white p-5 rounded-2xl m-3">
                    <p class="text-Neutral/100 font-medium text-2xl">Tentang RW 13</p>
                    <p class="text-Neutral/90 font-medium">RW 13 adalah Rukun Warga yang terletak di Desa Sumberporong,
                        Kecamatan Lawang, Kabupaten Malang.</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{--Pengumuman--}}
<section id="pengumuman" class="flex flex-col gap-8 mt-[8rem] m-3">
    <x-etc.title-content title="Pengumuman"
                         desc="Berisi list pengumuman yang berfungsi untuk memberi informasi kepada warga RW 13."></x-etc.title-content>
    <div class="flex flex-col gap-6 bg-[#F5F5F3] rounded-2xl p-12">
        <p class="text-Neutral/100 font-medium text-[2rem]">Pengumuman Terbaru</p>
        <div class="grid lg:grid-cols-3 gap-5">
            @foreach($data['pengumuman'] as $pengumuman)
                <x-card.pengumuman-card :pengumuman="$pengumuman"></x-card.pengumuman-card>
            @endforeach
        </div>
        <a href="/dashboard/pengumuman"
           class="self-center py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
            Selengkapnya</a>
    </div>
</section>
{{--Kegiatan--}}
<section class="flex flex-col gap-8 mt-[8rem] mx-[3.75rem]">
    <div class="flex justify-between max-lg:flex-col max-lg:gap-5 max-lg:items-start items-center">
        <div class="flex flex-col gap-3">
            <p class="text-[2.5rem] font-medium text-Neutral/100">Kegiatan Warga</p>
            <p class="text-Neutral/90 text-xl">Berisi daftar informasi kegiatan warga RW 13.</p>
        </div>
        <a href="/dashboard/dokumentasi"
           class="self-center max-lg:self-start py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
            Selengkapnya</a>
    </div>
    <div class="grid lg:grid-cols-2 gap-5">
        @foreach($data['dokumentasi']->take(2) as $dokumentasi)
            <x-card.dokumentasi-card :dokumentasi="$dokumentasi"></x-card.dokumentasi-card>
        @endforeach
    </div>
    <div class="grid lg:grid-cols-3 gap-5 -mt-2">
        @foreach($data['dokumentasi']->slice(2) as $dokumentasi)
            <x-card.dokumentasi-card :dokumentasi="$dokumentasi"></x-card.dokumentasi-card>
        @endforeach
    </div>
</section>
{{--Umkm--}}
<section class="flex flex-col gap-8 mt-[8rem] mx-[3.75rem]">
    <x-etc.title-content title="UMKM"
                         desc="Berisi daftar informasi UMKM warga RW 13."></x-etc.title-content>
    <div class="grid lg:grid-cols-3 gap-5">
        @foreach($data['umkm'] as $umkm)
            <x-card.umkm-card :umkm="$umkm"></x-card.umkm-card>
        @endforeach
    </div>
    <a href="/dashboard/umkm"
       class="self-center py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
        Selengkapnya</a>
</section>
{{--Footer--}}
@include('dashboard.layouts.footer')
@vite('resources/js/app.js')
</body>
<script type="module">
    document.addEventListener('DOMContentLoaded', function () {
        animateValue('warga', 0, @json($data['totalWarga']), 1000, "Orang");
        animateValue('kk', 0, @json($data['totalKK']), 1000, "KK");

        const anchor = document.querySelector('a[href="#pengumuman"]');
        const pengumuman = document.querySelector('#pengumuman');

        anchor.addEventListener('click', (event) => {
            event.preventDefault();
            pengumuman.scrollIntoView({behavior: 'smooth'});
        });
    });
</script>
</html>
