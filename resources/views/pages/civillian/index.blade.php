@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div class="flex flex-col gap-4 justify-center w-full pb-4 max-lg:mb-20">
        <x-etc.header-content head="{{$data['head']}}" desc="{{$data['desc']}}">
            <x-buttons.primary-button href="{{route('warga.create')}}">Tambah Data</x-buttons.primary-button>
        </x-etc.header-content>
        <div class="flex justify-between max-lg:flex-col-reverse max-lg:gap-2">
            @if (Auth::user()->role == 'RW')
                <div class="flex items-center gap-2 max-lg:hidden">
                    <x-buttons.filter-button :dt="$data" id="RW">RW 13 (Semua RT)</x-buttons.filter-button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="2" height="24" viewBox="0 0 2 24" fill="none">
                        <path d="M1 0V24" stroke="#E3E3E3"/>
                    </svg>
                    <x-buttons.filter-button :dt="$data" id="RT 1">RT 001</x-buttons.filter-button>
                    <x-buttons.filter-button :dt="$data" id="RT 2">RT 002</x-buttons.filter-button>
                    <x-buttons.filter-button :dt="$data" id="RT 3">RT 003</x-buttons.filter-button>
                    <x-buttons.filter-button :dt="$data" id="RT 4">RT 004</x-buttons.filter-button>
                    <x-buttons.filter-button :dt="$data" id="RT 5">RT 005</x-buttons.filter-button>
                </div>
                <div class="lg:hidden max-lg:w-[50%]">
                    <x-input.select-input id="rtResponsive" :options="['RW','RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5']"
                                          placeholder="Pilih RT"
                                          value="RW">
                    </x-input.select-input>
                </div>
            @endif
            <div class="flex gap-3 max-lg:gap-1 items-center max-lg:justify-start">
                <x-input.search-input name="search" placeholder="Cari nama atau nomor KK"></x-input.search-input>
                <x-dropdown.dropdown-filter>Filter</x-dropdown.dropdown-filter>
            </div>
        </div>
        <x-table.data-table :dt="$warga"
                            :headers="['No', 'Nama', 'NIK', 'KK', 'RT', 'Alamat', 'Aksi']">
            @php
                $no = ($warga->currentPage() - 1) * $warga->perPage() + 1;
            @endphp
            @foreach($warga as $dt)
                <x-table.table-row>
                    <td class="firstBodyTable">{{$no}}</td>
                    <td class="bodyTable">{{$dt->nama}}</td>
                    <td class="bodyTable">{{$dt->nik}}</td>
                    <td class="bodyTable">{{$dt->noKK}}</td>
                    <td class="bodyTable">{{$dt->alamat->rt}}</td>
                    <td class="bodyTable">{{$dt->alamat->alamat}}</td>
                    <td class="bodyTable">
                        <a href="{{ route('warga.show', $dt->id_warga) }}"
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
        let toggleCount = {};
        let filterResponsive;

        document.addEventListener('DOMContentLoaded', function () {
            // Get filter value from session storage
            filterResponsive = document.getElementById('rtResponsive');
            const filterValue = sessionStorage.getItem('filterResponsive');
            if (filterValue) {
                filterResponsive.value = filterValue;
            }
        });

        // When an option is selected, the value of the input is set to the selected option and the dropdown is hidden
        function selectOption(e, id) {
            filterResponsive = document.getElementById(id);
            filterResponsive.value = e.textContent.trim();
            filterByRT(filterResponsive.value)
            sessionStorage.setItem('filterResponsive', filterResponsive.value)
            const dropdownContent = e.closest('#content-' + id);
            const drop = document.getElementById('drop');
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
            const dropdownContent = document.getElementById(id);
            const drop = document.getElementById('drop');
            drop.classList.toggle('rotate-180');
            if (dropdownContent && toggleCount[id] !== 0) {
                dropdownContent.classList.toggle('hidden');
            }
            toggleCount[id]++;
        }

        // JavaScript function for filter with RT
        function filterByRT(rt) {
            let url = `/warga?rt=${rt}`;

            // Get dropdown filter values
            let peranElement = document.querySelector('input[name="peran"]:checked');
            let genderElement = document.querySelector('input[name="gender"]:checked');
            let statusElements = document.querySelectorAll('input[name="status[]"]:checked');

            let peran = peranElement ? peranElement.value : '';
            let gender = genderElement ? genderElement.value : '';
            let status = statusElements.length > 0 ? [...statusElements].map(input => input.value) : [];

            // Add dropdown filter values to URL if they are not empty
            if (peran !== '') {
                url += `&peran=${peran}`;
            }
            if (gender !== '') {
                url += `&gender=${gender}`;
            }
            if (status.length > 0) {
                url += `&status[]=${status.join('&status[]=')}`;
            }

            window.location.href = url;
        }

        // Focus filter when have filter
        document.addEventListener('click', (event) => {
            const dropdown = document.querySelector('.dropdown');
            const button = dropdown.querySelector('#filterInput');
            const urlParams = new URLSearchParams(window.location.search);
            const filters = [['peran'], ['gender'], ['status[]']];
            let activeFilters = 0;
            for (let filter of filters) {
                let filterValues = urlParams.getAll(filter[0]);
                if (filterValues.length > 0) {
                    filter.push(...filterValues);
                    activeFilters += filterValues.length;
                }
            }

            if (!dropdown.contains(event.target) && activeFilters === 0) {
                button.classList.remove('focusElement');
                button.querySelectorAll('path').forEach(path => {
                    path.classList.remove('fill-Primary/10');
                    path.classList.add('fill-[#025864]');
                });
            }
        });

        // count filter on
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const filters = [['peran'], ['gender'], ['status[]']];
            let activeFilters = 0;
            for (let filter of filters) {
                let filterValues = urlParams.getAll(filter[0]);
                if (filterValues.length > 0) {
                    filter.push(...filterValues);
                    activeFilters += filterValues.length;
                }
            }

            const countSpan = document.getElementById('count');
            if (activeFilters > 0) {
                countSpan.textContent = activeFilters;
                document.getElementById('filterInput').classList.add('focusElement');
                countSpan.classList.remove('hidden');
            } else {
                countSpan.classList.add('hidden');
            }
        }

        {{--Javascript function to add active style to filter button--}}
        function activeFilter(e) {
            e.classList.add('focusElement')
            e.querySelectorAll('path').forEach(path => {
                path.classList.remove('fill-[#025864]')
                path.classList.add('fill-Primary/10')
            })
        }

        {{--Javascript function to add active style for filter button--}}
        const inputFilterChange = () => {
            const count = document.getElementById('count')
            const button = document.querySelector('button[type="submit"]')
            button.classList.add('activeSubmitButton')
            button.classList.remove('pointer-events-none')
            count.classList.remove('hidden')
            count.innerText = document.querySelectorAll('input[type="radio"]:checked, input[type="checkbox"]:checked').length
        }

        {{--Javascript function to reset input--}}
        const resetInput = () => {
            const buttons = document.querySelectorAll('input[type="radio"], input[type="checkbox"]')

            const count = document.getElementById('count')
            count.classList.add('hidden')
            count.innerText = ''

            buttons.forEach(button => {
                button.checked = false
            })

            const button = document.querySelector('button[type="submit"]')
            button.classList.remove('activeSubmitButton')
            button.classList.add('pointer-events-none')

            window.location.href = '/warga';
        }

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
        <td class="bodyTable">${item.nama}</td>
        <td class="bodyTable">${item.nik}</td>
        <td class="bodyTable">${item.noKK}</td>
        <td class="bodyTable">${item.alamat.rt}</td>
        <td class="bodyTable">${item.alamat.alamat}</td>
        <td class="bodyTable">
            <a href="warga/${item.id}" class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium xl:text-base lg:text-xs py-3 px-4 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
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
                const response = await fetch(`/api/warga/search?search=${search}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                const responseData = await response.json();

                clearTable();

                responseData[0].data.forEach((item, index) => {
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
