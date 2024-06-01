<div class="p-5 flex flex-col gap-8 bg-white justify-start rounded-lg border border-Neutral/30">
    <div class="flex gap-2 items-center">
        <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
            <img src="{{$asset}}" alt="icon">
        </div>
        <p class="font-semibold text-Neutral/100 font-base">{{$title}}</p>
    </div>
    <p id="{{$id}}" class="text-Neutral/100 font-semibold text-2xl">{{$slot}}</p>
</div>
