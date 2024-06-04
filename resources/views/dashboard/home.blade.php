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
<section
    class="m-3 py-6 px-12 bg-[#F5F5F3] w-full rounded-[1.25rem]">
    {{--Navbar--}}
    @include('dashboard.layouts.navbar')
    <div class="flex flex-col h-[80vh] gap-8 justify-center">
        <div class="flex justify-between items-center gap-10 w-full">
            <p class="2xl:text-[3.75rem] xl:text-[3rem] lg:text-[2.5rem] text-Neutral/100 font-medium">Selamat Datang di
                Portal Informasi
                RW 13</p>
            <div class="flex flex-col gap-4">
                <p class="text-xl text-Neutral/90 font-normal">Halo warga!, silahkan gunakan website ini untuk
                    melihat
                    seputar
                    pengumuman dan informasi menarik
                    lainnya!.</p>
                <a href="#pengumuman"
                   class="py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Jelajahi</a>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
            <div class="rounded-2xl flex flex-col col-span-2 bg-white gap-5">
                <img src="{{asset('img/hero.jpg')}}" alt="hero" class="rounded-t-2xl">
                <div class="flex flex-col gap-3 px-5 pb-5">
                    <p class="text-Neutral/100 font-medium text-2xl">Tentang RW 13</p>
                    <p class="text-Neutral/90 font-medium text-base">RW 13 adalah Rukun Warga yang terletak di Desa
                        Sumberporong, Kecamatan Lawang, Kabupaten
                        Malang.</p>
                </div>
            </div>
            <div class="grid grid-rows-2 grid-cols-1 w-full gap-3 ">
                <div class="p-5 bg-white rounded-[1.25rem] flex flex-col justify-between items-start">
                    <div class="flex flex-col gap-3">
                        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                            <img src="{{asset('svg/profile.svg')}}" alt="icon" class="w-fit">
                        </div>
                        <p class="font-medium text-Neutral/100 text-xl">Total Warga</p>
                    </div>
                    <p id="warga" class="font-medium text-Neutral/100 text-[2rem]">{{$data['totalWarga']}} Orang</p>
                </div>
                <div class="p-5 bg-white rounded-[1.25rem] flex flex-col justify-between items-start">
                    <div class="flex flex-col gap-3">
                        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                            <img src="{{asset('svg/card.svg')}}" alt="icon" class="w-fit">
                        </div>
                        <p class="font-medium text-Neutral/100 text-xl">Total KK</p>
                    </div>
                    <p id="kk" class="font-medium text-Neutral/100 text-[2rem]">{{$data['totalKK']}} KK</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{--Pengumuman--}}
<section class="flex flex-col gap-8 mt-[8rem] m-3">
    <x-etc.title-content title="Pengumuman"
                         desc="Berisi list pengumuman yang berfungsi untuk memberi informasi kepada warga RW 13."></x-etc.title-content>
    <div id="pengumuman" class="flex flex-col gap-6 bg-[#F5F5F3] rounded-2xl p-12">
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
<footer class="mt-[8rem] py-12 px-[3.75rem] max-lg:flex-col-reverse flex justify-between w-full">
    <div class="flex flex-col gap-[8vh] justify-between">
        <p class="text-Primary/10 font-semibold text-[1.25rem]">Siwarga 13</p>
        <div class="flex flex-col gap-3">
            <p class="text-Neutral/70">Supported by</p>
            <div class="flex gap-3 items-center">
                <img src="{{asset('img/polinema.jpg')}}" alt="polinema">
                <img src="{{asset('img/jti.jpg')}}" alt="jti">
            </div>
        </div>
        <p class="text-Neutral/70">Dibuat pada tahun 2024 untuk memenuhi proyek akhir semester 4.</p>
    </div>
    <div class="flex max-lg:flex-col gap-[3.75rem] items-start justify-start">
        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-semibold">Menu</p>
            <a href="/dashboard" class="text-sm text-Neutral/80 font-medium">Beranda</a>
            <a href="dashboard/pengumuman" class="text-sm text-Neutral/80 font-medium">Pengumuman</a>
            <a href="dashboard/dokumentasi" class="text-sm text-Neutral/80 font-medium">Kegiatan Warga</a>
            <a href="dashboard/umkm" class="text-sm text-Neutral/80 font-medium">UMKM</a>
            <a href="/login" class="text-sm text-Neutral/80 font-medium">Admin login</a>
        </div>
        <div class="flex flex-col gap-3">
            <p class="text-Neutral/100 font-semibold">Kontributor</p>
            <p class="text-sm text-Neutral/80 font-medium">Dyinastie Marchelina P. <br>
                (System Analyst)</p>
            <p class="text-sm text-Neutral/80 font-medium">Emir Abiyyu D. <br>
                (UI/UX Designer)</p>
            <p class="text-sm text-Neutral/80 font-medium">Syahrul Bhudi F. <br>
                (Fullstack Developer)</p>
            <p class="text-sm text-Neutral/80 font-medium">M. Rifky Harto B. <br>
                (Project Manager)</p>
        </div>
    </div>
</footer>
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
