<label for="{{$id}}" class="flex flex-col gap-2 w-full">
    <span class="text-Neutral/100 text-sm font-medium">{{$slot}}</span>
    <input type="number" step="0.01"
           class="outline-none border border-Neutral/30 rounded-[1.25rem] px-4 py-2 focus:border-Primary/10 focus:text-Primary/10"
           id="{{$id}}" name="{{$id}}" value="{{$value}}" placeholder="{{$placeholder}}"
           @if(Route::currentRouteName() == 'warga.show') readonly @endif>
</label>
