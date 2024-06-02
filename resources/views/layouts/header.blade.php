<div class="flex items-center justify-between py-6 px-5 gap-1 border-b border-b-Neutral/30">
    <div>
        <p class="font-medium text-xs text-Neutral/60">{{\Carbon\Carbon::now()->format('d F Y')}}</p>
        <p class="xl:text-base lg:text-sm font-semibold text-Neutral/100">{{$data['title']}}</p>
    </div>
    <div class="lg:hidden cursor-pointer buttonAnimation" onclick="openSidebar()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path d="M3.75 7.25H20.25M3.75 12.5H20.25M3.75 17.75H20.25" stroke="black" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
</div>
