<label class="flex flex-col gap-2 w-full" for="{{$id}}">
    <span class="text-Neutral/100 text-sm font-medium">{{$slot}}</span>
    <input type="date"
           class="outline-none border border-Neutral/30 rounded-[1.25rem] px-4 py-2 focus:border-Primary/10 focus:text-Primary/10"
           id="{{$id}}" name="{{$id}}" placeholder="{{$placeholder}}" value="{{$value}}">
</label>
