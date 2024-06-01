@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
    <div class="w-full h-full mt-4 flex flex-col items-center justify-center">
        <div class="flex justify-center gap-10 w-[70%] h-full max-lg:flex-col">
            <div class="flex flex-col gap-5 h-full w-full">
                <x-input.text-input placeholder="" id="nik"
                                    value="{{ is_object($warga) && isset($warga['nik']) ? $warga['nik'] : '' }}">
                    NIK
                </x-input.text-input>
                <x-input.text-input placeholder="" id="noKK"
                                    value="{{ is_object($warga) && isset($warga['noKK']) ? $warga['noKK'] : '' }}">
                    KK
                </x-input.text-input>
                <x-input.text-input placeholder="" id="nama"
                                    value="{{ is_object($warga) && isset($warga['nama']) ? $warga['nama'] : '' }}">
                    Nama
                </x-input.text-input>
                <x-input.text-input id="status_peran"
                                    placeholder=""
                                    value="{{ is_object($warga) && isset($warga->status) ? $warga->status->status_peran : '' }}">
                    Peran dalam Keluarga
                </x-input.text-input>
                <x-input.text-input placeholder="" id="tempat_lahir"
                                    value="{{ is_object($warga) && isset($warga['tempat_lahir']) ? $warga['tempat_lahir'] : '' }}">
                    Tempat Lahir
                </x-input.text-input>
                <x-input.text-input placeholder="" id="tanggal"
                                    value="{{ is_object($warga) && isset($warga['tanggal']) ? $warga['tanggal'] : '' }}">
                    Tanggal Lahir
                </x-input.text-input>
                <x-input.text-input placeholder="" id="jenis_kelamin"
                                    value="{{ is_object($warga) && isset($warga['jenis_kelamin']) ? $warga['jenis_kelamin'] : '' }}">
                    Jenis Kelamin
                </x-input.text-input>
                <x-input.text-input placeholder="" id="alamat"
                                    value="{{ is_object($warga) && isset($warga->alamat) ? $warga->alamat->alamat : '' }}">
                    Alamat
                </x-input.text-input>
            </div>
            <div class="flex flex-col gap-5 h-full w-full">
                <x-input.text-input placeholder="" id="rt"
                                    value="{{ is_object($warga) && isset($warga->alamat) ? str_pad(explode(' ', $warga->alamat->rt)[1], 3, '0', STR_PAD_LEFT) : '' }}">
                    RT
                </x-input.text-input>
                <x-input.text-input placeholder="" id="agama"
                                    value="{{ is_object($warga) && isset($warga['agama']) ? $warga['agama'] : '' }}">
                    Agama
                </x-input.text-input>
                <x-input.text-input id="status_nikah"
                                    placeholder=""
                                    value="{{ is_object($warga) && isset($warga->status) ? $warga->status->status_nikah : '' }}">
                    Status Perkawinan
                </x-input.text-input>
                <x-input.text-input placeholder="" id="pekerjaan"
                                    value="{{ is_object($warga) && isset($warga['pekerjaan']) ? $warga['pekerjaan'] : '' }}">
                    Pekerjaan
                </x-input.text-input>
                <x-input.text-input id="status_hidup"
                                    placeholder=""
                                    value="{{ is_object($warga) && isset($warga->status) ? $warga->status->status_hidup : '' }}">
                    Status Hidup
                </x-input.text-input>
                <x-input.text-input id="pendapatan"
                                    placeholder=""
                                    value="{{ is_object($warga) && isset($warga['pendapatan']) ? $warga['pendapatan'] : '' }}">
                    Pendapatan
                </x-input.text-input>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center w-full h-full">
        <div class="flex w-[70%] my-5 justify-end">
            <x-buttons.primary-button id="edit" href="{{ route('warga.edit', $warga['id_warga']) }}">Ubah
            </x-buttons.primary-button>
        </div>
    </div>
@endsection
