<label for="{{$id}}"
       class="flex items-center gap-3 py-3 px-4 border border-Neutral/30 rounded-[1.25rem] font-medium text-Neutral/100 text-sm w-full text-nowrap has-[:checked]:bg-[#0258640f] has-[:checked]:border-Primary/10">
    <input type="checkbox" name="{{$name}}" id="{{$id}}" value="{{$value}}"
           class="checkbox checked:bg-Primary/10 w-5 h-5 outline-1"
           onchange="inputFilterChange()">
    {{$slot}}
</label>
