@props(['pengumuman'])

<div onclick="window.location.href='/dashboard/pengumuman/{{$pengumuman['id_pengumuman']}}'" data-aos="zoom-in-up"
     class="bg-white cursor-pointer flex flex-col gap-5 rounded-2xl group">
    <div class="bg-Neutral/60 p-8 rounded-t-2xl h-[30vh] relative overflow-hidden transform transition-transform duration-300 group-hover:-translate-y-2">
        <p class="bg-white p-3 rounded-[1.25rem] relative w-fit z-10">{{$pengumuman['tanggal']}}</p>
        <img src="{{$pengumuman['path_thumbnail']}}" loading="lazy" alt="thumbnail"
             class="w-1/2 max-lg:w-full max-lg:left-0 max-lg:p-4 absolute top-10 left-1/4 brightness-75 z-0">
    </div>
    <div class="px-5 transform transition-transform duration-300 group-hover:-translate-y-2">
        <div class="flex flex-col gap-2">
            <p class="font-medium text-Neutral/100 text-2xl">{{$pengumuman['judul']}}</p>
            <p class="text-Neutral/90 font-medium">
                @if(strlen($pengumuman['content']) > 150)
                    {!! Str::markdown(substr($pengumuman['content'], 0, 150). '...') !!}
                @else
                    {!! Str::markdown($pengumuman['content']) !!}
                @endif
            </p>
        </div>
    </div>
    <a href="/dashboard/pengumuman/{{$pengumuman->id_pengumuman}}"
       class="text-Neutral/100 px-5 pb-5 font-medium mt-auto underline transform transition-transform duration-300 group-hover:-translate-y-2">Baca
        disini</a>
</div>
