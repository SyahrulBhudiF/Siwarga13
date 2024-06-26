@props(['umkm'])

<div onclick="window.location.href='/dashboard/umkm/{{$umkm['id_umkm']}}'" data-aos="zoom-in"
     class="bg-[#F5F5F3] cursor-pointer flex flex-col gap-5 rounded-2xl group">
    <div
        class="rounded-t-2xl h-[30vh] relative overflow-hidden p-3 transform transition-transform duration-300 group-hover:-translate-y-2">
        <img src="{{$umkm->file[0]->path}}" loading="lazy" alt="thumbnail"
             class="w-full h-full absolute top-0 left-0 object-cover z-0">
    </div>
    <div class="px-5 rounded-b-2xl pb-5 w-fit transform transition-transform duration-300 group-hover:-translate-y-2">
        <div class="flex flex-col gap-4">
            <p class="font-medium text-Neutral/100 text-2xl">{{$umkm['judul']}}</p>
            <div>
                <p class="text-Neutral/80 font-sm">Alamat</p>
                <p class="font-medium text-Neutral/100">{{$umkm['alamat']}}</p>
            </div>
            <div>
                <p class="text-Neutral/80 font-sm">Kategori</p>
                <p class="font-medium text-Neutral/100">{{$umkm['kategori']}}</p>
            </div>
        </div>
    </div>
</div>
