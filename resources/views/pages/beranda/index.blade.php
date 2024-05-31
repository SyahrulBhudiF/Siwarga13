@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4 justify-center w-full pb-8">
        <p class="text-Neutral/100 font-medium xl:text-xl lg:text-sm">Rangkuman Data Warga RW 13</p>
        <div class="grid lg:grid-cols-3 bg-[#F5F7F9] rounded-xl gap-1 p-1">
            <x-card.card-beranda asset="{{asset('svg/profile.svg')}}"
                                 title="Total jumlah warga">{{$data['jumlah_warga']}} Orang
            </x-card.card-beranda>
            <x-card.card-beranda asset="{{asset('svg/card.svg')}}"
                                 title="Total jumlah KK">{{$data['jumlah_kk']}} KK
            </x-card.card-beranda>
            <x-card.card-beranda asset="{{asset('svg/like-shapes.svg')}}"
                                 title="Total peserta bansos">{{$data['jumlah_kk']}} KK
            </x-card.card-beranda>
        </div>
        <p class="text-Neutral/100 font-medium xl:text-xl lg:text-sm">Fitur tersedia</p>
        <div class="grid lg:grid-cols-3 gap-3">
            <x-card.card-nav asset="{{asset('svg/warga.svg')}}" title="Kelola data warga"
                             href="/warga">Halaman untuk mengelola data warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/bansos.svg')}}" title="Bansos"
                             href="/bansos">Halaman untuk mengelola peserta bansos warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/pengumuman.svg')}}" title="Pengumuman"
                             href="/pengumuman">Halaman untuk mengunggah pengumuman kepada warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/umkm.svg')}}" title="UMKM"
                             href="/umkm">Halaman untuk mengunggah konten promosi UMKM.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/dokumentasi.svg')}}" title="Kegiatan"
                             href="/dokumentasi">Halaman untuk mengelola dokumentasi kegiatan warga.
            </x-card.card-nav>
        </div>
    </div>
@endsection
