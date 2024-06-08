@extends('dashboard.layouts.template')

@section('content')
    <section class="flex flex-col gap-8 fade-in mt-[3.5rem] mb-10 mx-4">
        <svg onclick="window.location.href='/dashboard'" class="lg:hidden cursor-pointer buttonAnimation"
            xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10" fill="none">
            <path d="M4.75 8.75L1 5M1 5L4.75 1.25M1 5H19" stroke="black" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <x-etc.title-content title="UMKM"
            desc="Berisi list pengumuman yang berfungsi untuk memberi informasi kepada warga RW 13."></x-etc.title-content>
    </section>

    <section class="flex flex-col gap-8 mt-[3.5rem] fade-in m-3 p-12 bg-Neutral/40 rounded-[1.25rem]">
        <div class="grid lg:grid-cols-3 gap-x-5 gap-y-6">
            @foreach ($data['umkm'] as $umkm)
                <x-card.umkm-card :umkm="$umkm"></x-card.umkm-card>
            @endforeach
        </div>
        <div class="flex justify-center gap-2">
            {{ $data['umkm']->links('components.pagination.landing') }}
        </div>
    </section>
@endsection
