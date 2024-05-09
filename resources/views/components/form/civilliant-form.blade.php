<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" class="flex flex-col gap-5 items-center w-[50%] mb-[10vh]">
        @csrf
        <x-input.text-input placeholder="Masukkan nomor NIK" id="nik"
                            value="{{ is_object($warga) && isset($warga['nik']) ? $warga['nik'] : ''}}">NIK
        </x-input.text-input>
        <x-input.text-input placeholder="Masukkan nomor KK" id="noKK"
                            value="{{ is_object($warga) && isset($warga['noKK']) ? $warga['noKK'] : ''}}">KK
        </x-input.text-input>
        <x-input.text-input placeholder="Masukkan nama lengkap" id="nama"
                            value="{{ is_object($warga) && isset($warga['nama']) ? $warga['nama'] : ''}}">
            Nama
        </x-input.text-input>
        <x-input.select-input id="status_peran" :options="['Kepala keluarga', 'Anggota keluarga']"
                              placeholder="Pilih status keluarga"
                              value="{{ is_object($warga) && isset($warga->status) ? $warga->status->status_peran : ''}}">
            Status Keluarga
        </x-input.select-input>
        <div class="flex gap-2 w-full items-center">
            <x-input.text-input placeholder="Masukkan tempat lahir" id="tempat_lahir"
                                value="{{is_object($warga) && isset($warga['tempat_lahir']) ? $warga['tempat_lahir'] : ''}}">
                Tempat
                Lahir
            </x-input.text-input>
            <x-input.date-input placeholder="dd/mm/yy" id="tanggal"
                                value="{{is_object($warga) && isset($warga['tanggal']) ? $warga['tanggal'] : ''}}">
                Tanggal
                Lahir
            </x-input.date-input>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <span class="text-Neutral/100 text-sm font-medium">Jenis Kelamin</span>
            <div class="flex gap-2 items-center w-full">
                <x-input.radio-input name="gender" id="laki"
                                     value="Laki-laki"
                                     checked="{{is_object($warga) && ($warga['jenis_kelamin'] == 'Laki-laki')}}">
                    Laki-laki
                </x-input.radio-input>
                <x-input.radio-input name="gender" id="perempuan"
                                     value="Perempuan"
                                     checked="{{is_object($warga) && ($warga['jenis_kelamin'] == 'Perempuan')}}">
                    Perempuan
                </x-input.radio-input>
            </div>
        </div>
        <x-input.text-input placeholder="Masukkan alamat sesuai KTP" id="alamat"
                            value="{{is_object($warga) && isset($warga->alamat) ? $warga->alamat->alamat : ''}}">
            Alamat
        </x-input.text-input>
        <x-input.select-input id="rt" :options="['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5']"
                              placeholder="Pilih RT sesuai KTP"
                              value="{{is_object($warga) && isset($warga->alamat) ? $warga->alamat->rt : ''}}">RT
        </x-input.select-input>
        <x-input.select-input id="agama" :options="['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu']"
                              placeholder="Pilih Agama"
                              value="{{is_object($warga) && isset($warga['agama']) ? $warga['agama'] : ''}}">Agama
        </x-input.select-input>
        <x-input.select-input id="status_nikah" :options="['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']"
                              placeholder="Pilih status perkawinan"
                              value="{{is_object($warga) && isset($warga->status) ? $warga->status->status_nikah : ''}}">
            Status Perkawinan
        </x-input.select-input>
        <x-input.text-input placeholder="Masukkan pekerjaan" id="pekerjaan"
                            value="{{is_object($warga) && isset($warga['pekerjaan']) ? $warga['pekerjaan'] : ''}}">
            Pekerjaan
        </x-input.text-input>
        <div class="flex flex-col gap-2 w-full">
            <span class="text-Neutral/100 text-sm font-medium">Status Warga</span>
            <div class="flex gap-2 items-center w-full">
                <x-input.radio-input name="status_hidup" id="Hidup"
                                     value="Hidup"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Hidup')}}">
                    Hidup
                </x-input.radio-input>
                <x-input.radio-input name="status_hidup" id="Meninggal"
                                     value="Meninggal"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Meninggal')}}">
                    Meninggal
                </x-input.radio-input>
                <x-input.radio-input name="status_hidup" id="Pindah"
                                     value="Pindah"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Pindah')}}">
                    Pindah
                </x-input.radio-input>
            </div>
        </div>
        <x-input.number-input id="pendapatan"
                              value="{{is_object($warga) && isset($warga['pendapatan']) ? $warga['pendapatan'] : 0}}"
                              placeholder="Rp|..">Pendapatan Perbulan (Opsional)
        </x-input.number-input>
        <div class="flex justify-end w-full">
            <button type="submit"
                    class="bg-Primary/10 w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>
