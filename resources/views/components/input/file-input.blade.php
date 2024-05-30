@props(['id', 'accept', 'multiple', 'value', 'name'])

<label class="flex flex-col gap-2 w-full" for="{{$id}}">
    <span class="text-Neutral/100 xl:text-base lg:text-xs font-medium">{{$slot}}</span>
    <input type="file"
           class="hidden"
           id="{{$id}}" name="{{$id}}" accept="{{$accept}}" {{$multiple ? 'multiple' : ''}} value="{{$value}}"
           onchange="document.getElementById('{{$id}}_filename').textContent = this.files[0].name; document.getElementById('{{$id}}_filename').classList.remove('text-Neutral/60'); document.getElementById('{{$id}}_filename').classList.add('text-Neutral/100');">
    <span class="flex justify-between items-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] px-4 py-2
    focus:border-Primary/10 focus:text-Primary/10">
        @if($value)
            <span id="{{$id}}_filename" class="text-Neutral/100">{{$name}}</span>
        @else
            <span id="{{$id}}_filename" class="text-Neutral/60">Upload file anda kesini</span>
        @endif
        <span
            class="flex cursor-pointer buttonAnimation items-center gap-2 py-2 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                 fill="none">
              <path
                  d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                  stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Upload
        </span>
    </span>
</label>
