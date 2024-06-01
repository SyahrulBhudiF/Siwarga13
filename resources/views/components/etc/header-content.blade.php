<div class="flex justify-between max-lg:flex-col max-lg:items-start max-lg:gap-2 items-center w-full">
    <div class="flex flex-col gap-2">
        <p class="font-medium text-Neutral/100 2xl:text-xl lg:text-base max-lg:text-lg">{{$head}}</p>
        <p class="font-normal text-Neutral/70 2xl:text-sm xl:text-sm text-xs">{{$desc}}</p>
    </div>
    {{$slot}}
</div>
