@props(['id', 'value'])

<label for="{{$id}}" class="flex flex-col gap-2 w-full">
    <span class="text-Neutral/100 xl:text-base lg:text-xs font-medium">{{$slot}}</span>
    <label for="{{$id}}"
           class="txtcontainer cursor-text flex flex-col items-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] px-4 py-4">
        <span id="toolbar" class=""></span>
        <span id="editor" class="shadow-2xl"></span>
        <span class="self-start w-full mt-5">
            <textarea id="{{$id}}" name="{{$id}}"
                      class="text-wrap bg-white textarea cursor-text">{{$value}}</textarea>
        </span>
    </label>
    <script type="text/javascript">
        let tinyMDE = new TinyMDE.Editor({textarea: "{{$id}}"});
        let commandBar = new TinyMDE.CommandBar({
            element: "toolbar",
            editor: tinyMDE,
        });
    </script>
</label>
