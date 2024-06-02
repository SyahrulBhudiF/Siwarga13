@props(['dokumentasi', 'action'])

<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" enctype="multipart/form-data"
          class="flex flex-col gap-5 items-center xl:w-[50%] max-lg:w-[90%] lg:w-[65%] mb-[10vh]">
        @csrf
        @if(is_object($dokumentasi))
            @method('PUT')
            <input type="hidden" name="dokumentasiOld" value="{{$dokumentasi}}">
        @endif
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan judul kegiatan" id="judul"
                                value="{{ old('judul', is_object($dokumentasi) && isset($dokumentasi->judul) ? $dokumentasi->judul : '')}}">
                Judul
            </x-input.text-input>
            @error('judul')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="w-full">
            <x-input.date-input placeholder="Contoh : 01 Januari 2001" id="tanggal"
                                value="{{old('tanggal', is_object($dokumentasi) && isset($dokumentasi['tanggal']) ? $dokumentasi['tanggal'] : '')}}">
                Tanggal Pelaksanaan
            </x-input.date-input>
            @error('tanggal')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="w-full">
            <x-input.image-input
                value="{{ old('file', is_object($dokumentasi) && isset($dokumentasi->file) ? $dokumentasi->file : '') }}">
                Upload foto kegiatan
            </x-input.image-input>
            @error('file1')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
            @error('file2')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
            @error('file3')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
            @error('file4')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
            @error('file5')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
            @error('file6')
            <span class="text-red-500 text-xs font-medium" id="warningText">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            <x-input.textarea-input id="content"
                                    value="{{ old('content', is_object($dokumentasi) && isset($dokumentasi['content']) ? $dokumentasi['content'] : 'Masukkan deskripsi kegiatan')}}">
                Deskripsi Kegiatan
            </x-input.textarea-input>
            @error('content')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="flex justify-end gap-2 w-full">
            @if(is_object($dokumentasi))
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
@if(is_object($dokumentasi))
    <x-modal.delete action="{{$action}}"/>
@endif
<!-- Modal Loading -->
<x-etc.loading></x-etc.loading>
<script>
    document.querySelector('button[type="submit"]').addEventListener('click', function () {
        document.getElementById('loadingModal').style.display = 'block';
    });
</script>
