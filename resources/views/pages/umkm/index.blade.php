@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div class="flex flex-col gap-4 justify-center w-full pb-4">
        <x-etc.header-content head="{{$data['title']}}" desc="">
            <x-buttons.primary-button href="{{route('umkm.create')}}">Tambah Data</x-buttons.primary-button>
        </x-etc.header-content>
        <x-input.search-input name="judul" placeholder="Cari Judul"/>
        <x-table.data-table :dt="$umkm"
                            :headers="['No', 'Judul', 'Alamat','Kategori','Kontak penjual','Aksi']">
            @php
                $no = ($umkm->currentPage() - 1) * $umkm->perPage() + 1;
            @endphp
            @foreach($umkm as $dt)
                <x-table.table-row>
                    <td class="firstBodyTable">{{$no}}</td>
                    <td class="bodyTable">{{$dt->judul}}</td>
                    <td class="bodyTable">{{$dt->alamat}}</td>
                    <td class="bodyTable">{{$dt->kategori}}</td>
                    <td class="bodyTable">{{$dt->no_telp}}</td>
                    <td class="bodyTable">
                        <a href="{{ route('umkm.edit', $dt->id_umkm) }}"
                           class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium 2xl:text-base xl:text-sm lg:text-xs 2xl:py-3 xl:py-2 2xl:px-4 xl:px-3 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
                    </td>
                </x-table.table-row>
                @php
                    $no++;
                @endphp
            @endforeach
        </x-table.data-table>
    </div>
@endsection
