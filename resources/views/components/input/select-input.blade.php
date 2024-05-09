<div class="dropdown dropdown-bottom flex flex-col gap-2 w-full">
    <label class="flex flex-col gap-2 w-full group" for="{{$id}}" onclick="toggleDropdown('content-{{$id}}')">
        <span class="text-Neutral/100 text-sm font-medium">{{$slot}}</span>
        <label for="{{$id}}" class="flex items-center w-full relative">
            <input type="text" id="{{$id}}" name="{{$id}}" value="{{$value}}"
                   placeholder="{{$placeholder}}" readonly
                   class="outline-none w-full bg-white border border-Neutral/30 rounded-[1.25rem] px-4 py-2 focus:border-Primary/10 focus:text-Primary/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 class="absolute right-3 cursor-pointer" id="drop">
                <path
                    d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
                    class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
                <path
                    d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
                    class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
                <path
                    d="M11.9999 15.0099C11.8099 15.0099 11.6199 14.9399 11.4699 14.7899L7.93991 11.2599C7.64991 10.9699 7.64991 10.4899 7.93991 10.1999C8.22991 9.90992 8.70991 9.90992 8.99991 10.1999L11.9999 13.1999L14.9999 10.1999C15.2899 9.90992 15.7699 9.90992 16.0599 10.1999C16.3499 10.4899 16.3499 10.9699 16.0599 11.2599L12.5299 14.7899C12.3799 14.9399 12.1899 15.0099 11.9999 15.0099Z"
                    class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
                <path
                    d="M11.9999 15.0099C11.8099 15.0099 11.6199 14.9399 11.4699 14.7899L7.93991 11.2599C7.64991 10.9699 7.64991 10.4899 7.93991 10.1999C8.22991 9.90992 8.70991 9.90992 8.99991 10.1999L11.9999 13.1999L14.9999 10.1999C15.2899 9.90992 15.7699 9.90992 16.0599 10.1999C16.3499 10.4899 16.3499 10.9699 16.0599 11.2599L12.5299 14.7899C12.3799 14.9399 12.1899 15.0099 11.9999 15.0099Z"
                    class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
            </svg>
        </label>
    </label>
    <ul tabindex="0" id="content-{{$id}}"
        class="dropdown-content z-[1] menu px-3 py-4 mt-2 shadow rounded-[1.25rem] flex flex-col w-full bg-white border border-Neutral/30 gap-4">
        @foreach($options as $option)
            <li class="cursor-pointer hover:bg-Neutral/20 hover:text-Primary/10 py-2 px-3 rounded-[1.25rem] transition ease-in-out duration-200"
                onclick="selectOption(this, '{{$id}}')">
                {{ $option }}
            </li>
            @if (!$loop->last)
                <hr class="border-t border-Neutral/30">
            @endif
        @endforeach
    </ul>
</div>
