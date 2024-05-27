@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div class="flex flex-col gap-4 justify-center w-full pb-4">
        <x-etc.header-content head="{{$data['title']}}" desc="">
            <x-buttons.primary-button href="{{route('pengumuman.create')}}">Tambah Data</x-buttons.primary-button>
        </x-etc.header-content>
        <x-input.search-input name="judul" placeholder="Cari Judul"/>
        <x-table.data-table :dt="$pengumuman"
                            :headers="['No', 'Judul', 'Tanggal', 'Perihal', 'No. Surat', 'Aksi']">
            @php
                $no = ($pengumuman->currentPage() - 1) * $pengumuman->perPage() + 1;
            @endphp
            @foreach($pengumuman as $dt)
                <x-table.table-row>
                    <td class="firstBodyTable">{{$no}}</td>
                    <td class="bodyTable">{{$dt->judul}}</td>
                    <td class="bodyTable">{{$dt->tanggal}}</td>
                    <td class="bodyTable">
                        @if(strlen($dt->perihal) > 20)
                            {{substr($dt->perihal, 0, 20)}}...
                        @else
                            {{$dt->perihal}}
                        @endif
                    </td>
                    <td class="bodyTable">{{$dt->nomor}}</td>
                    <td class="bodyTable">
                        <a href="{{ route('pengumuman.edit', $dt->id_pengumuman) }}"
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
