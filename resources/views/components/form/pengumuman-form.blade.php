<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" enctype="multipart/form-data"
          class="flex flex-col gap-5 items-center xl:w-[50%] lg:w-[60%] mb-[10vh]">
        @csrf
        @if(is_object($pengumuman))
            @method('PUT')
            <input type="hidden" name="pengumumanOld" value="{{$pengumuman}}">
            <input type="hidden" name="fileOld" value="{{$pengumuman->file}}">
        @endif
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan judul pengumuman" id="judul"
                                value="{{ old('judul', is_object($pengumuman) && isset($pengumuman['judul']) ? $pengumuman['judul'] : '')}}">
                Judul
            </x-input.text-input>
            @error('judul')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.date-input placeholder="Contoh : 01 Januari 2001" id="tanggal"
                                value="{{old('tanggal', is_object($pengumuman) && isset($pengumuman['tanggal']) ? $pengumuman['tanggal'] : '')}}">
                Tanggal
            </x-input.date-input>
            @error('tanggal')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan nomor surat" id="nomor"
                                value="{{ old('nomor', is_object($pengumuman) && isset($pengumuman['nomor']) ? $pengumuman['nomor'] : '')}}">
                Nomor Surat
            </x-input.text-input>
            @error('nomor')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan perihal" id="perihal"
                                value="{{ old('perihal', is_object($pengumuman) && isset($pengumuman['perihal']) ? $pengumuman['perihal'] : '')}}">
                Perihal
            </x-input.text-input>
            @error('perihal')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan tujuan surat kepada siapa" id="kepada"
                                value="{{ old('kepada', is_object($pengumuman) && isset($pengumuman['kepada']) ? $pengumuman['kepada'] : '')}}">
                Kepada
            </x-input.text-input>
            @error('kepada')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.file-input id="file" accept=".pdf" multiple="true"
                                name="{{is_object($pengumuman) ? $pengumuman->file->name : ''}}"
                                value="{{ old('file', is_object($pengumuman) && isset($pengumuman->file) ? $pengumuman->file->path : '') }}">
                Upload file surat (format .pdf)
            </x-input.file-input>
            @error('file')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.textarea-input id="content"
                                    value="{{ old('content', is_object($pengumuman) && isset($pengumuman['content']) ? $pengumuman['content'] : 'Masukkan isi surat')}}">
                Deskripsi atau isi pengumuman
            </x-input.textarea-input>
            @error('content')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="flex justify-end gap-2 w-full">
            @if(is_object($pengumuman))
                <span onclick="modalDelete.showModal()"
                      class="bg-white border cursor-pointer border-[#E14942] w-fit text-[#E14942] font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-95 buttonAnimation">
                Hapus
            </span>
            @endif
            <button type="submit"
                    class="bg-Neutral/30 pointer-events-none w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>
<!-- Open the modal using ID.showModal() method -->
@if(is_object($pengumuman))
    <dialog id="modalDelete" class="modal w-screen modal-bottom sm:modal-middle">
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
                <form method="dialog" class="w-full">
                    <!-- if there is a button in form, it will close the modal -->
                    <button
                        class="border border-[#D0D5DD] text-[#344054] w-full shadow-xs rounded-lg py-3 px-5 outline-none buttonAnimation font-semibold">
                        Batal
                    </button>
                </form>
                <form method="POST" action="{{$action}}/{{$pengumuman->id_pengumuman}}}" id="deleteForm" class="w-full">
                    @csrf
                    @method('DELETE')
                    <div onclick="document.getElementById('deleteForm').submit();"
                         class="border border-[#D92D20] text-center bg-[#D92D20] w-full text-white shadow-xs rounded-lg py-3 px-5 outline-none buttonAnimation cursor-pointer font-semibold">
                        Ya, Hapus
                    </div>
                </form>
            </div>
        </div>
    </dialog>
@endif
<!-- Modal Loading -->
<x-etc.loading></x-etc.loading>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('input, select, textarea');
        const submitButton = document.querySelector('button[type="submit"]');

        function checkInputs() {
            let allFilled = true;

            if (allFilled) {
                submitButton.classList.remove('bg-Neutral/30', 'pointer-events-none');
                submitButton.classList.add('bg-Primary/10');
            } else {
                submitButton.classList.add('bg-Neutral/30', 'pointer-events-none');
                submitButton.classList.remove('bg-Primary/10');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        // Check inputs initially
        checkInputs();
    });

    document.querySelector('button[type="submit"]').addEventListener('click', function () {
        document.getElementById('loadingModal').style.display = 'block';
    });
</script>
