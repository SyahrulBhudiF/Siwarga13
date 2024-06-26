@props(['action'])

<dialog id="modalDelete" class="modal w-screen modal-middle">
    <div class="modal-box p-6 flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <div class="p-3 rounded-full bg-[#FEF3F2] w-fit">
                <div class="p-3 rounded-full bg-[#FEE4E2]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <path
                            d="M16 6V5.2C16 4.0799 16 3.51984 15.782 3.09202C15.5903 2.71569 15.2843 2.40973 14.908 2.21799C14.4802 2 13.9201 2 12.8 2H11.2C10.0799 2 9.51984 2 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8 3.51984 8 4.0799 8 5.2V6M10 11.5V16.5M14 11.5V16.5M3 6H21M19 6V17.2C19 18.8802 19 19.7202 18.673 20.362C18.3854 20.9265 17.9265 21.3854 17.362 21.673C16.7202 22 15.8802 22 14.2 22H9.8C8.11984 22 7.27976 22 6.63803 21.673C6.07354 21.3854 5.6146 20.9265 5.32698 20.362C5 19.7202 5 18.8802 5 17.2V6"
                            stroke="#D92D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-Neutral/100 xl:text-xl text-lg font-semibold">Hapus konten ini?</p>
                <p class="text-[#475467] font-normal text-sm">Apakah Anda yakin ingin menghapus konten ini? Aksi ini
                    tidak dapat
                    diurungkan.</p>
            </div>
        </div>
        <div class="modal-action justify-center items-center w-full">
            <form method="dialog" class="w-full" id="dialogForm">
                <!-- if there is a button in form, it will close the modal -->
                <button
                    class="border border-[#D0D5DD] text-[#344054] w-full shadow-xs rounded-lg py-3 px-5 outline-none buttonAnimation font-semibold">
                    Batal
                </button>
            </form>
            <form method="POST" action="{{$action}}" id="deleteForm" class="w-full">
                @csrf
                @method('DELETE')
                <div
                    onclick="document.getElementById('deleteForm').submit();document.getElementById('loadingModal').style.display = 'block';document.getElementById('dialogForm').submit();"
                    class="border border-[#D92D20] text-center bg-[#D92D20] w-full text-white shadow-xs rounded-lg py-3 px-5 outline-none buttonAnimation cursor-pointer font-semibold">
                    Ya, Hapus
                </div>
            </form>
        </div>
    </div>
</dialog>
