<div class="flex justify-center w-full mt-4">
    <form method="post" action="{{$action}}" class="flex flex-col gap-5 items-center w-[50%] mb-[10vh]">
        @csrf
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan nomor NIK" id="nik"
                                value="{{ old('nik', is_object($warga) && isset($warga['nik']) ? $warga['nik'] : '')}}">
                NIK
            </x-input.text-input>
            @error('nik')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan nomor KK" id="noKK"
                                value="{{ old('noKK', is_object($warga) && isset($warga['noKK']) ? $warga['noKK'] : '')}}">
                KK
            </x-input.text-input>
            @error('noKK')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan nama lengkap" id="nama"
                                value="{{ old('nama', is_object($warga) && isset($warga['nama']) ? $warga['nama'] : '')}}">
                Nama
            </x-input.text-input>
            @error('nama')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.select-input id="status_peran" :options="['Kepala keluarga', 'Anggota keluarga']"
                                  placeholder="Pilih status keluarga"
                                  value="{{ old('status_peran', is_object($warga) && isset($warga->status) ? $warga->status->status_peran : '')}}">
                Status Keluarga
            </x-input.select-input>
            @error('status_peran')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="flex gap-2 w-full items-start">
            <div class="w-full">
                <x-input.text-input placeholder="Masukkan tempat lahir" id="tempat_lahir"
                                    value="{{old('tempat_lahir', is_object($warga) && isset($warga['tempat_lahir']) ? $warga['tempat_lahir'] : '')}}">
                    Tempat
                    Lahir
                </x-input.text-input>
                @error('tempat_lahir')
                <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
                @enderror
            </div>
            <div class="w-full">
                <x-input.date-input placeholder="Contoh : 01 Januari 2001" id="tanggal"
                                    value="{{old('tanggal', is_object($warga) && isset($warga['tanggal']) ? $warga['tanggal'] : '')}}">
                    Tanggal
                    Lahir
                </x-input.date-input>
                @error('tanggal')
                <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <span class="text-Neutral/100 text-sm font-medium">Jenis Kelamin</span>
            <div class="flex gap-2 items-center w-full">
                <x-input.radio-input name="jenis_kelamin" id="laki"
                                     value="Laki-laki"
                                     checked="{{ is_object($warga) && ($warga['jenis_kelamin'] == 'Laki-laki')}}"
                                     fn="">
                    Laki-laki
                </x-input.radio-input>
                <x-input.radio-input name="jenis_kelamin" id="perempuan"
                                     value="Perempuan"
                                     checked="{{is_object($warga) && ($warga['jenis_kelamin'] == 'Perempuan')}}"
                                     fn="">
                    Perempuan
                </x-input.radio-input>
            </div>
            @error('jenis_kelamin')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan alamat sesuai KTP" id="alamat"
                                value="{{old('alamat',is_object($warga) && isset($warga->alamat) ? $warga->alamat->alamat : '')}}">
                Alamat
            </x-input.text-input>
            @error('alamat')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.select-input id="rt" :options="['RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5']"
                                  placeholder="Pilih RT sesuai KTP"
                                  value="{{old('rt',is_object($warga) && isset($warga->alamat) ? $warga->alamat->rt : '')}}">
                RT
            </x-input.select-input>
            @error('rt')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.select-input id="agama" :options="['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu']"
                                  placeholder="Pilih Agama"
                                  value="{{old('agama',is_object($warga) && isset($warga['agama']) ? $warga['agama'] : '')}}">
                Agama
            </x-input.select-input>
            @error('agama')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.select-input id="status_nikah" :options="['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']"
                                  placeholder="Pilih status perkawinan"
                                  value="{{old('status_nikah',is_object($warga) && isset($warga->status) ? $warga->status->status_nikah : '')}}">
                Status Perkawinan
            </x-input.select-input>
            @error('status_nikah')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.text-input placeholder="Masukkan pekerjaan" id="pekerjaan"
                                value="{{old('pekerjaan',is_object($warga) && isset($warga['pekerjaan']) ? $warga['pekerjaan'] : '')}}">
                Pekerjaan
            </x-input.text-input>
            @error('pekerjaan')
            <small class="text-[#FF0A0A] text-sm font-medium mt-2">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-full">
            <span class="text-Neutral/100 text-sm font-medium">Status Warga</span>
            <div class="flex gap-2 items-center w-full">
                <x-input.radio-input name="status_hidup" id="Hidup"
                                     value="Hidup"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Hidup')}}"
                                     fn="">
                    Hidup
                </x-input.radio-input>
                <x-input.radio-input name="status_hidup" id="Meninggal"
                                     value="Meninggal"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Meninggal')}}"
                                     fn="">
                    Meninggal
                </x-input.radio-input>
                <x-input.radio-input name="status_hidup" id="Pindah"
                                     value="Pindah"
                                     checked="{{is_object($warga) && ($warga->status->status_hidup == 'Pindah')}}"
                                     fn="">
                    Pindah
                </x-input.radio-input>
            </div>
            @error('status_hidup')
            <small class="text-[#FF0A0A] text-sm font-medium">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <x-input.number-input id="pendapatan"
                                  value="{{old('pendapatan',is_object($warga) && isset($warga['pendapatan']) ? $warga['pendapatan'] : 0)}}"
                                  placeholder="Rp|..">Pendapatan Perbulan (Opsional)
            </x-input.number-input>
            @error('pendapatan')
            <small class="text-[#FF0A0A] text-sm font-medium">{{$message}}</small>
            @enderror
        </div>
        <div class="flex justify-end w-full">
            <button type="submit"
                    class="bg-Primary/10 w-fit text-white font-semibold rounded-[1.25rem] px-7 py-3 hover:brightness-90 buttonAnimation">
                Simpan
            </button>
        </div>
    </form>
</div>

