<div class="p-5 flex flex-col gap-2 bg-white justify-start rounded-lg border border-Neutral/30">
    <div class="flex flex-col gap-3">
        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
            <img src="{{$asset}}" alt="icon">
        </div>
        <p class="text-Neutral/100 font-semibold text-xl">{{$title}}</p>
        <p class="font-normal text-Neutral/90 text-base">{{$slot}}</p>
    </div>
    <a href="{{$href}}"
       class="py-3 px-7 w-fit mt-auto font-medium text-Primary/10 text-base rounded-[6.25rem] border border-Neutral/30">Kunjungi</a>
</div>
