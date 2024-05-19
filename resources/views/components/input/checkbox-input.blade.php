<label for="{{$id}}"
       class="flex items-center cursor-pointer gap-3 py-3 px-4 border border-Neutral/30 rounded-[1.25rem] font-medium text-Neutral/100 xl:text-base lg:text-xs  w-full text-nowrap has-[:checked]:bg-[#0258640f] has-[:checked]:border-Primary/10">
    <input type="checkbox" name="{{$name}}" id="{{$id}}" value="{{$value}}"
           {{$checked ? 'checked' : ''}} class="checkbox checked:bg-Primary/10 w-5 h-5 outline-1"
           onchange="inputFilterChange()"
           @if(Route::currentRouteName() == 'warga.show') readonly @endif>
    {{$slot}}
</label>
@error($id)
<span class="text-red-500 text-xs">{{ $message }}</span>
@enderror
