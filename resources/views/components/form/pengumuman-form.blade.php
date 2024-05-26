<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" enctype="multipart/form-data"
          class="flex flex-col gap-5 items-center xl:w-[50%] lg:w-[60%] mb-[10vh]">
        @csrf
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
        <div class="flex justify-end w-full">
            <button type="submit"
                    class="bg-Neutral/30 pointer-events-none w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>
<!-- Modal Loading -->
<x-etc.loading></x-etc.loading>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('input, select, textarea');
        const submitButton = document.querySelector('button[type="submit"]');

        function checkInputs() {
            let allFilled = true;

            inputs.forEach(input => {
                if (input.type !== 'radio' && !input.value.trim()) {
                    allFilled = false;
                } else if (input.type === 'radio' && !document.querySelector(`input[name="${input.name}"]:checked`)) {
                    allFilled = false;
                }
            });

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
