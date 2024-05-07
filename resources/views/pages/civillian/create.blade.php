@extends('layouts.app')
@section('content')
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
    <div class="flex justify-center w-full mt-4">
        <form method="post" action="/warga" class="flex flex-col gap-5 items-center w-[50%] mb-[10vh]">
            @csrf
            <x-input.text-input placeholder="Masukkan nomor NIK" id="nik" value="">NIK</x-input.text-input>
            <x-input.text-input placeholder="Masukkan nomor KK" id="noKK" value="">KK</x-input.text-input>
            <x-input.text-input placeholder="Masukkan nama lengkap" id="nama" value="">Nama</x-input.text-input>
            <x-input.select-input id="status_peran" :options="['Kepala keluarga', 'Anggota keluarga']"
                                  placeholder="Pilih status keluarga" value="">Status Keluarga
            </x-input.select-input>
            <div class="flex gap-2 w-full items-center">
                <x-input.text-input placeholder="Masukkan tempat lahir" id="tempat_lahir" value="">Tempat Lahir
                </x-input.text-input>
                <x-input.date-input placeholder="dd/mm/yy" id="tanggal" value="">Tanggal Lahir
                </x-input.date-input>
            </div>
            <div class="flex flex-col gap-2 w-full">
                <span class="text-Neutral/100 text-sm font-medium">Jenis Kelamin</span>
                <div class="flex gap-2 items-center w-full">
                    <x-input.radio-input name="gender" id="laki"
                                         value="Laki-laki" checked="">
                        Laki-laki
                    </x-input.radio-input>
                    <x-input.radio-input name="gender" id="perempuan"
                                         value="Perempuan" checked="">
                        Perempuan
                    </x-input.radio-input>
                </div>
            </div>
            <x-input.text-input placeholder="Masukkan alamat sesuai KTP" id="alamat" value="">Alamat
            </x-input.text-input>
            <x-input.select-input id="rt" :options="['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5']"
                                  placeholder="Pilih RT sesuai KTP" value="">RT
            </x-input.select-input>
            <x-input.select-input id="agama" :options="['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu']"
                                  placeholder="Pilih Agama" value="">Agama
            </x-input.select-input>
            <x-input.select-input id="status_nikah" :options="['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']"
                                  placeholder="Pilih status perkawinan" value="">Status Perkawinan
            </x-input.select-input>
            <x-input.text-input placeholder="Masukkan pekerjaan" id="pekerjaan" value="">Pekerjaan</x-input.text-input>
            <div class="flex flex-col gap-2 w-full">
                <span class="text-Neutral/100 text-sm font-medium">Status Warga</span>
                <div class="flex gap-2 items-center w-full">
                    <x-input.radio-input name="status_hidup" id="Hidup"
                                         value="Hidup" checked="">
                        Hidup
                    </x-input.radio-input>
                    <x-input.radio-input name="status_hidup" id="Meninggal"
                                         value="Meninggal" checked="">
                        Meninggal
                    </x-input.radio-input>
                    <x-input.radio-input name="status_hidup" id="Pindah"
                                         value="Pindah" checked="">
                        Pindah
                    </x-input.radio-input>
                </div>
            </div>
            <x-input.number-input id="pendapatan" value="" placeholder="Rp|..">Pendapatan Perbulan (Opsional)
            </x-input.number-input>
            <div class="flex justify-end w-full">
                <button type="submit"
                        class="bg-Primary/10 w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:bg-Primary/20 buttonAnimation">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        let toggleCount = {};

        // When an option is selected, the value of the input is set to the selected option and the dropdown is hidden
        function selectOption(e, id) {
            let input = document.getElementById(id);
            input.value = e.textContent.trim();
            let dropdownContent = e.closest('#content-' + id);
            let drop = document.getElementById('drop');
            drop.classList.toggle('rotate-180');
            if (dropdownContent) {
                dropdownContent.classList.toggle('hidden');
            }
            // Set toggleCount to 0 when an option is selected
            toggleCount[id] = 0;
        }

        // When dropdown click is triggered hidden class is toggled
        function toggleDropdown(id) {
            if (!toggleCount[id]) {
                toggleCount[id] = 0;
            }
            let dropdownContent = document.getElementById(id);
            let drop = document.getElementById('drop');
            drop.classList.toggle('rotate-180');
            if (dropdownContent && toggleCount[id] % 2 === 1) {
                dropdownContent.classList.toggle('hidden');
            }
            toggleCount[id]++;
        }
    </script>
@endpush
