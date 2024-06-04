<nav class="flex justify-between items-center w-full h-[8vh]">
    <p class="text-xl text-Neutral/100 font-semibold">Siwarga 13</p>
    <ul class="flex gap-6 items-center">
        <li class="{{$data['active'] == 'beranda' ? 'activeLandingNav' : 'landingNav'}}">
            <a class="{{$data['active'] == 'beranda' ? 'nav-link' : ''}}" href="">Beranda</a>
        </li>
        <li class="{{$data['active'] == 'pengumuman' ? 'activeLandingNav' : 'landingNav'}}">
            <a class="{{$data['active'] == 'pengumuman' ? 'nav-link' : ''}}" href="">Pengumuman</a>
        </li>
        <li class="{{$data['active'] == 'kegiatan' ? 'activeLandingNav' : 'landingNav'}}">
            <a class="{{$data['active'] == 'kegiatan' ? 'nav-link' : ''}}" href="">Kegiatan Warga</a>
        </li>
        <li class="{{$data['active'] == 'umkm' ? 'activeLandingNav' : 'landingNav'}}">
            <a class="{{$data['active'] == 'umkm' ? 'nav-link' : ''}}" href="">UMKM</a>
        </li>
        <li class="buttonAnimation">
            <a class="py-3 px-6 hover:bg-Neutral/30 duration-300 transition ease-in-out cursor-pointer rounded-3xl border border-Neutral/40 font-semibold text-sm text-Neutral/100"
               href="">Masuk sebagai admin</a>
        </li>
    </ul>
</nav>
