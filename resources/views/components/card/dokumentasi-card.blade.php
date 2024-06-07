@props(['dokumentasi'])

<div data-aos="zoom-in" class="bg-[#F5F5F3] flex flex-col gap-5 rounded-2xl ">
    <div class="rounded-t-2xl h-[30vh] relative overflow-hidden p-3">
        <p class="bg-white p-3 rounded-[1.25rem] relative w-fit z-10">{{$dokumentasi['tanggal']}}</p>
        <img src="{{$dokumentasi->file[0]->path}}" alt="thumbnail"
             class="w-full h-full absolute top-0 left-0 object-cover z-0">
    </div>
    <div class="px-5 rounded-b-2xl pb-5 w-fit">
        <div class="flex flex-col gap-2">
            <p class="font-medium text-Neutral/100 text-2xl">{{$dokumentasi['judul']}}</p>
            <p class="text-Neutral/90 font-medium">
                @if(strlen($dokumentasi['content']) > 150)
                    {!! Str::markdown(substr($dokumentasi['content'], 0, 150). '...') !!}
                @else
                    {!! Str::markdown($dokumentasi['content']) !!}
                @endif
            </p>
        </div>
    </div>
</div>
