@extends('dashboard.layouts.template')
@section('content')
    <div class="flex justify-between w-full p-[3.75rem]">
        <p class="text-Primary/10 font-medium text-xl">Pengumuman</p>
        <p class="text-Neutral/90 font-medium text-xl">{{ $data['formatted'] }}</p>
    </div>
    <section class="w-full flex justify-center">
        <div class="flex flex-col gap-10 items-center xl:w-[50%] max-lg:w-[90%] lg:w-[65%] mb-[10vh]">
            <div class="lg:grid lg:grid-cols-2 gap-3 w-full">
                <div class="p-3 bg-[#F5F5F3] rounded-[1.25rem] text-Neutral/100 font-normal text-base">
                    Nomor: {{ $data['pengumuman']->nomor }}
                </div>
                <div class="p-3 bg-[#F5F5F3] rounded-[1.25rem] text-Neutral/100 font-normal text-base">
                    Kepada: {{ $data['pengumuman']->kepada }}
                </div>
                <div class="p-3 bg-[#F5F5F3] rounded-[1.25rem] text-Neutral/100 font-normal text-base">
                    Perihal: {{ $data['pengumuman']->perihal }}
                </div>
                <div class="p-3 bg-[#F5F5F3] rounded-[1.25rem] text-Neutral/100 font-normal text-base">
                    Penerbit: {{ $data['pengumuman']->penerbit }}
                </div>
            </div>
            <div class="mb-10 w-full">
                <p class="text-Neutral/100 font-medium text-[2rem]">{{ $data['pengumuman']->judul }}</p>
                <p class="text-Neutral/100 font-normal text-xl">{!! Str::markdown($data['pengumuman']->content) !!}</p>
            </div>
            <div class="w-full h-[18vh]">
                <p class="text-Neutral/100 text-xl font-medium">Surat Resmi</p>
                <div class="flex items-center p-3 rounded-[1.25rem] bg-[#F5F5F3] justify-between w-full h-full">
                    <div class="flex items-center gap-5 w-full h-full">
                        <div class="bg-Neutral/60 p-5 rounded-[1.25rem] overflow-hidden w-[20vh] h-full">
                            <img src="{{ $data['pengumuman']->path_thumbnail }}" alt="thumbnail" class="brightness-100">
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-xl font-medium text-Neutral/90">{{$data['pengumuman']->file->name}}</p>
                            <div class="flex gap-3 items-center">
                                <p class="text-sm text-Neutral/90 font-medium">
                                    Diterbitkan {{$data['pengumuman']->tanggal}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6"
                                     fill="none">
                                    <circle cx="3" cy="3" r="3" fill="#D9D9D9"/>
                                </svg>
                                <p class="text-sm text-Neutral/90 font-medium">
                                    {{$data['fileSize']}}mb
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{$data['pengumuman']->file->path}}" target="_blank"
                       class="py-3 px-6 rounded-[1.25rem] bg-Primary/10 text-Neutral/10 font-semibold text-sm mr-[2rem]"
                       download>Download</a>
                </div>
            </div>
        </div>
    </section>
@endsection
