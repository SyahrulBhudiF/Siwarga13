@extends('dashboard.layouts.template')
@section('content')
    <section class="w-full flex justify-center mt-[3.75rem]">
        <div class="flex flex-col gap-8 items-center xl:w-[50%] max-lg:w-[90%] lg:w-[65%] mb-[10vh]">
            <div class="flex gap-3 items-center">
                <p class="py-3 px-5 bg-[#0258641A] text-Primary/10 font-medium rounded-[1.25rem]">Kegiatan Warga</p>
                <p class="text-Neutral/90 font-medium">{{$data['formatted']}}</p>
            </div>
            <p class="text-[2.5rem] font-medium text-Neutral/100">{{$data['dokumentasi']->judul}}</p>
            <x-etc.slider :dt="$data['dokumentasi']->file"></x-etc.slider>
            <div class="w-full">
                <p class="text-Neutral/100 font-normal text-xl">{!! Str::markdown($data['dokumentasi']->content) !!}</p>
            </div>
        </div>
    </section>
@endsection
