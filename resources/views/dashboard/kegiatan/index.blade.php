@extends('dashboard.layouts.template')

@section('content')
    <section class="flex flex-col fade-in gap-8 mt-[3.5rem] mb-10">
        <x-etc.title-content title="Kegiatan Warga"
                             desc="Berisi daftar informasi kegiatan warga RW 13."></x-etc.title-content>
    </section>

    <section class="flex flex-col gap-8 mt-[3.5rem] m-3 fade-in p-12 bg-Neutral/40 rounded-[1.25rem]">
        <div class="grid lg:grid-cols-3 gap-x-5 gap-y-6">
            @foreach ($data['dokumentasi']->all() as $dokumentasi)
                <x-card.dokumentasi-card :dokumentasi="$dokumentasi"></x-card.dokumentasi-card>
            @endforeach
        </div>
        <div class="flex justify-center gap-2">
            {{ $data['dokumentasi']->links('components.pagination.landing') }}
        </div>
    </section>
@endsection
