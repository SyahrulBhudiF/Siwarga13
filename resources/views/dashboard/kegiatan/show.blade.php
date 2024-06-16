@extends('dashboard.layouts.template')
@section('content')
    <svg onclick="window.location.href='/dashboard/dokumentasi'"
         class="lg:hidden cursor-pointer buttonAnimation ml-4 mt-[3.75rem]" xmlns="http://www.w3.org/2000/svg"
         width="20"
         height="10" viewBox="0 0 20 10" fill="none">
        <path d="M4.75 8.75L1 5M1 5L4.75 1.25M1 5H19" stroke="black" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"/>
    </svg>
    <section class="w-full flex justify-center mt-[3.75rem] max-lg:mt-[2rem]">
        <div class="flex flex-col gap-8 items-center xl:w-[60%] max-lg:w-full max-lg:p-4 max-lg:items-center lg:w-[70%] mb-[10vh]">
            <div class="flex gap-3 items-center max-sm:flex-col">
                <p class="py-3 px-5 bg-[#0258641A] max-sm:text-sm text-Primary/10 font-medium rounded-[1.25rem] text-nowrap">Kegiatan Warga</p>
                <p class="text-Neutral/90 font-medium text-nowrap max-sm:text-sm">{{ $data['formatted'] }}</p>
            </div>
            <p class="text-[2.5rem] max-lg:text-[2rem] font-medium text-Neutral/100">{{ $data['dokumentasi']->judul }}</p>
            <x-etc.slider :dt="$data['dokumentasi']->file"></x-etc.slider>
            <div class="w-full">
                <p class="text-Neutral/100 font-normal text-xl">{!! Str::markdown($data['dokumentasi']->content) !!}</p>
            </div>
        </div>
    </section>
@endsection
