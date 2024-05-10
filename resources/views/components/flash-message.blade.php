@if(session('success'))
    <div id="flash"
         class="flex gap-2 items-center py-[0.6rem] px-3 bg-white absolute top-[7vh] left-[40%] border border-Neutral/30 shadow rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path
                d="M12.5 2C6.99 2 2.5 6.49 2.5 12C2.5 17.51 6.99 22 12.5 22C18.01 22 22.5 17.51 22.5 12C22.5 6.49 18.01 2 12.5 2ZM17.28 9.7L11.61 15.37C11.47 15.51 11.28 15.59 11.08 15.59C10.88 15.59 10.69 15.51 10.55 15.37L7.72 12.54C7.43 12.25 7.43 11.77 7.72 11.48C8.01 11.19 8.49 11.19 8.78 11.48L11.08 13.78L16.22 8.64C16.51 8.35 16.99 8.35 17.28 8.64C17.57 8.93 17.57 9.4 17.28 9.7Z"
                fill="#3EAF3F"/>
        </svg>
        <p class="text-Neutral/100 text-sm font-medium">{{ session('success') }}</p>
    </div>
@elseif(session('error'))
    <div id="flash"
         class="flex gap-2 items-center py-[0.6rem] px-3 bg-white absolute top-[7vh] left-[40%] border border-Neutral/30 shadow rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path
                d="M12.5 2C6.99 2 2.5 6.49 2.5 12C2.5 17.51 6.99 22 12.5 22C18.01 22 22.5 17.51 22.5 12C22.5 6.49 18.01 2 12.5 2ZM17.28 9.7L11.61 15.37C11.47 15.51 11.28 15.59 11.08 15.59C10.88 15.59 10.69 15.51 10.55 15.37L7.72 12.54C7.43 12.25 7.43 11.77 7.72 11.48C8.01 11.19 8.49 11.19 8.78 11.48L11.08 13.78L16.22 8.64C16.51 8.35 16.99 8.35 17.28 8.64C17.57 8.93 17.57 9.4 17.28 9.7Z"
                fill="#3EAF3F"/>
        </svg>
        <p class="text-Neutral/100 text-sm font-medium">{{ session('success') }}</p>
    </div>
@endif
<script>
    window.onload = function () {
        const flashMessage = document.getElementById('flash');

        setTimeout(function () {
            flashMessage.style.display = 'none';
        }, 2000); // 2000 milidetik = 2 detik
    }
</script>
