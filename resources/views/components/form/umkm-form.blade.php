@props(['umkm', 'action'])

<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" enctype="multipart/form-data"
          class="flex flex-col gap-5 items-center xl:w-[50%] max-lg:w-[90%] lg:w-[65%] mb-[10vh]">
        @csrf
        @if(is_object($umkm))
            @method('PUT')
            <input type="hidden" name="umkmOld" value="{{$umkm}}">
        @endif
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan judul umkm" id="judul"
                                value="{{ old('judul', is_object($umkm) && isset($umkm->judul) ? $umkm->judul : '')}}">
                Judul
            </x-input.text-input>
            @error('judul')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="w-full">
            <x-input.text-input placeholder="Masukkan alamat UMKM" id="alamat"
                                value="{{ old('alamat', is_object($umkm) && isset($umkm->alamat) ? $umkm->alamat : '')}}">
                Alamat
            </x-input.text-input>
            @error('alamat')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="w-full">
            <x-input.select-input id="kategori"
                                  :options="['Kuliner', 'Fashion', 'Kecantikan', 'Agribisnis', 'Otomotif']"
                                  placeholder="Pilih kategori"
                                  value="{{ old('kategori', is_object($umkm) && isset($umkm['kategori']) ? $umkm['kategori'] : '')}}">
                Kategori
            </x-input.select-input>
            @error('kategori')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="flex max-lg:flex-col gap-2 w-full items-center">
            <div class="w-full">
                <x-input.number-input placeholder="Rp| Minimal (cth: 5000)" id="harga_awal"
                                      value="{{old('harga_awal', is_object($umkm) && isset($umkm['harga_awal']) ? $umkm['harga_awal'] : '')}}">
                    Kisaran Harga
                </x-input.number-input>
                @error('harga_awal')
                <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
                @enderror
            </div>
            <div class="w-full">
                <x-input.number-input placeholder="Rp| Maksimal (cth: 10000)" id="harga_akhir"
                                      value="{{old('harga_akhir', is_object($umkm) && isset($umkm['harga_akhir']) ? $umkm['harga_akhir'] : '')}}">
                    <div class="text-white">a</div>
                </x-input.number-input>
                @error('harga_akhir')
                <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="w-full">
            <x-input.text-input placeholder="Masukkan nomor penjual" id="no_telp"
                                value="{{ old('no_telp', is_object($umkm) && isset($umkm->no_telp) ? $umkm->no_telp : '')}}">
                Kontak Penjual
            </x-input.text-input>
            @error('no_telp')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>

        <div class="w-full">
            <x-input.image-input
                value="{{ old('file', is_object($umkm) && isset($umkm->file) ? $umkm->file : '') }}">
                Upload foto produk
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
                                    value="{{ old('content', is_object($umkm) && isset($umkm['content']) ? $umkm['content'] : 'Masukkan deskripsi kegiatan')}}">
                Deskripsi UMKM
            </x-input.textarea-input>
            @error('content')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="flex justify-end gap-2 w-full">
            @if(is_object($umkm))
                <span onclick="modalDelete.showModal()"
                      class="bg-white border cursor-pointer border-[#E14942] w-fit text-[#E14942] font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-95 buttonAnimation">
                Hapus
            </span>
            @endif
            <button type="submit"
                    class="bg-Primary/10  w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>
<!-- Open the modal using ID.showModal() method -->
@if(is_object($umkm))
    <x-modal.delete action="{{$action}}"/>
@endif
<!-- Modal Loading -->
<x-etc.loading></x-etc.loading>
<script>
    document.querySelector('button[type="submit"]').addEventListener('click', function () {
        document.getElementById('loadingModal').style.display = 'block';
    });
</script>
