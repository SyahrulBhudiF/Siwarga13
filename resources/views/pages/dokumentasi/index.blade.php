@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div class="flex flex-col gap-4 justify-center w-full pb-4">
        <x-etc.header-content head="{{$data['title']}}" desc="">
            <x-buttons.primary-button href="{{route('dokumentasi.create')}}">Tambah Data</x-buttons.primary-button>
        </x-etc.header-content>
        <x-input.search-input name="judul" placeholder="Cari Judul"/>
        <x-table.data-table :dt="$dokumentasi"
                            :headers="['No', 'Judul', 'Tanggal','Aksi']">
            @php
                $no = ($dokumentasi->currentPage() - 1) * $dokumentasi->perPage() + 1;
            @endphp
            @foreach($dokumentasi as $dt)
                <x-table.table-row>
                    <td class="firstBodyTable">{{$no}}</td>
                    <td class="bodyTable">{{$dt->judul}}</td>
                    <td class="bodyTable">{{$dt->tanggal}}</td>
                    <td class="bodyTable">
                        <a href="{{ route('dokumentasi.edit', $dt->id_dokumentasi) }}"
                           class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium 2xl:text-base xl:text-sm text-xs 2xl:py-3 py-2 2xl:px-4 px-3 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
                    </td>
                </x-table.table-row>
                @php
                    $no++;
                @endphp
            @endforeach
        </x-table.data-table>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/debounce.js') }}"></script>
    <script>
        // Fungsi untuk membersihkan tabel
        function clearTable() {
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
        }

        // Fungsi untuk menambahkan baris baru ke tabel
        function addRowToTable(item, no) {
            const table = document.getElementById('dataTable');
            const row = table.insertRow(-1);

            row.innerHTML = `
        <x-table.table-row>
            <td class="firstBodyTable">${no}</td>
            <td class="bodyTable">${item.judul}</td>
            <td class="bodyTable">${item.tanggal}</td>
            <td class="bodyTable">
                <a href="dokumentasi/edit/${item.id_dokumentasi}" class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium 2xl:text-base xl:text-sm lg:text-xs 2xl:py-3 xl:py-2 2xl:px-4 xl:px-3 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
            </td>
        </x-table.table-row>
    `;

        }

        /// Fungsi untuk melakukan pencarian
        let searchFunction = debounce(async function () {
            let input;
            input = document.getElementById('searchInput');
            search = input.value;

            try {
                // Make a request to the server
                const response = await fetch(`/api/dokumentasi/search?search=${search}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                });

                const responseData = await response.json();

                clearTable();

                responseData[0].forEach((item, index) => {
                    addRowToTable(item, index + 1);
                });

            } catch (error) {
                const table = document.getElementById('dataTable');

                clearTable();

                const row = table.insertRow(-1);
                row.innerHTML = `
                    <td colspan="7" class="text-center p-6 bg-white border-b font-medium text-Neutral/60">Data tidak ditemukan</td>
                    `;
            }
        }, 300);
    </script>
@endpush
