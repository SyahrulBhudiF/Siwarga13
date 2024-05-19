<label class="flex flex-col gap-2 w-full" for="{{$id}}">
    <span
        class="{{Route::currentRouteName() == 'warga.show'? 'text-Neutral/60' : 'text-Neutral/100'}} xl:text-base lg:text-xs font-medium">{{$slot}}</span>
    <input type="text"
           class="outline-none xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] px-4 py-2 {{Route::currentRouteName() != 'warga.show'?'focus:border-Primary/10 focus:text-Primary/10':'pointer-events-none'}}"
           id="{{$id}}" name="{{$id}}" placeholder="{{$placeholder}}" value="{{$value}}"
           @if(Route::currentRouteName() == 'warga.show') readonly @endif>
</label>

