<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" enctype="multipart/form-data"
          class="flex flex-col gap-5 items-center xl:w-[50%] max-lg:w-[90%] lg:w-[65%] mb-[10vh]">
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
                    class="bg-Primary/10 w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>
<!-- Open the modal using ID.showModal() method -->
@if(is_object($pengumuman))
    <x-modal.delete action="{{$action}}"/>
@endif
<!-- Modal Loading -->
<x-etc.loading></x-etc.loading>
<script>
    document.querySelector('button[type="submit"]').addEventListener('click', function () {
        document.getElementById('loadingModal').style.display = 'block';
    });
</script>
