@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <div class="flex flex-col gap-4 justify-center w-full pb-4">
        <x-etc.header-content head="{{$data['head']}}" desc="{{$data['desc']}}">
            <a id="checkStep" href="/bansos/check/edas"
               class="link group buttonAnimation flex items-center gap-2 no-underline xl:text-sm lg:text-xs">
                Check Step
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     class="rotate-180 max-lg:self-end">
                    <path
                        d="M9.56994 18.8201C9.37994 18.8201 9.18994 18.7501 9.03994 18.6001L2.96994 12.5301C2.67994 12.2401 2.67994 11.7601 2.96994 11.4701L9.03994 5.40012C9.32994 5.11012 9.80994 5.11012 10.0999 5.40012C10.3899 5.69012 10.3899 6.17012 10.0999 6.46012L4.55994 12.0001L10.0999 17.5401C10.3899 17.8301 10.3899 18.3101 10.0999 18.6001C9.95994 18.7501 9.75994 18.8201 9.56994 18.8201Z"
                        class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
                    <path
                        d="M9.56994 18.8201C9.37994 18.8201 9.18994 18.7501 9.03994 18.6001L2.96994 12.5301C2.67994 12.2401 2.67994 11.7601 2.96994 11.4701L9.03994 5.40012C9.32994 5.11012 9.80994 5.11012 10.0999 5.40012C10.3899 5.69012 10.3899 6.17012 10.0999 6.46012L4.55994 12.0001L10.0999 17.5401C10.3899 17.8301 10.3899 18.3101 10.0999 18.6001C9.95994 18.7501 9.75994 18.8201 9.56994 18.8201Z"
                        fill-opacity="0.2" class="fill-black group-hover:fill-Primary/10"/>
                    <path
                        d="M20.5 12.75H3.67004C3.26004 12.75 2.92004 12.41 2.92004 12C2.92004 11.59 3.26004 11.25 3.67004 11.25H20.5C20.91 11.25 21.25 11.59 21.25 12C21.25 12.41 20.91 12.75 20.5 12.75Z"
                        class="fill-[#1B1B1B] group-hover:fill-Primary/10"/>
                    <path
                        d="M20.5 12.75H3.67004C3.26004 12.75 2.92004 12.41 2.92004 12C2.92004 11.59 3.26004 11.25 3.67004 11.25H20.5C20.91 11.25 21.25 11.59 21.25 12C21.25 12.41 20.91 12.75 20.5 12.75Z"
                        class="fill-black group-hover:fill-Primary/10" fill-opacity="0.2"/>
                </svg>
            </a>
        </x-etc.header-content>
        <div class="flex justify-between w-full max-lg:flex-col max-lg:gap-2">
            <div class="flex gap-1 items-center">
                <button id="buttonEdas" class="filterButton py-2 px-4 activeFilterButton" onclick="changeSPK(this)">
                    Edas
                </button>
                <button id="buttonMabac" class="filterButton py-2 px-4" onclick="changeSPK(this)">
                    Mabac
                </button>
            </div>
            <div class="flex items-center gap-3">
                <x-input.search-input name="search" placeholder="Cari nama atau nomor KK"></x-input.search-input>
                <a id="refresh" href="/bansos/calculate/edas"
                   class="xl:py-3 py-2 max-lg:px-4 xl:text-sm text-xs buttonAnimation hover:bg-Primary/10 hover:brightness-[.90] xl:px-7 lg:px-5 active:brightness-[.80] transition ease-in-out duration-300 bg-Primary/10 rounded-[6.25rem] text-center text-white font-medium">
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M19.0833 10.0003C19.0833 9.58611 18.7475 9.25033 18.3333 9.25033C17.9191 9.25033 17.5833 9.58611 17.5833 10.0003H19.0833ZM2.59163 13.7003V12.9503C2.17741 12.9503 1.84163 13.2861 1.84163 13.7003H2.59163ZM0.916626 10.0003C0.916626 10.4145 1.25241 10.7503 1.66663 10.7503C2.08084 10.7503 2.41663 10.4145 2.41663 10.0003H0.916626ZM18.3333 6.30033V7.05033C18.7475 7.05033 19.0833 6.71454 19.0833 6.30033H18.3333ZM19.0833 2.13366C19.0833 1.71945 18.7475 1.38366 18.3333 1.38366C17.9191 1.38366 17.5833 1.71945 17.5833 2.13366H19.0833ZM14.6333 5.55033C14.2191 5.55033 13.8833 5.88611 13.8833 6.30033C13.8833 6.71454 14.2191 7.05033 14.6333 7.05033V5.55033ZM6.35829 14.4503C6.77251 14.4503 7.10829 14.1145 7.10829 13.7003C7.10829 13.2861 6.77251 12.9503 6.35829 12.9503V14.4503ZM1.84163 17.867C1.84163 18.2812 2.17741 18.617 2.59163 18.617C3.00584 18.617 3.34163 18.2812 3.34163 17.867H1.84163ZM17.5833 10.0003C17.5833 14.1861 14.1857 17.5837 9.99996 17.5837V19.0837C15.0142 19.0837 19.0833 15.0145 19.0833 10.0003H17.5833ZM9.99996 17.5837C7.96042 17.5837 6.28089 16.5555 5.07467 15.4615C4.47635 14.9188 4.01113 14.3744 3.6961 13.9661C3.539 13.7625 3.42039 13.5942 3.34233 13.4789C3.30333 13.4213 3.27454 13.3771 3.25622 13.3484C3.24706 13.3341 3.24052 13.3237 3.23664 13.3174C3.2347 13.3143 3.23343 13.3122 3.23282 13.3113C3.23252 13.3108 3.23238 13.3105 3.23241 13.3106C3.23243 13.3106 3.23248 13.3107 3.23258 13.3109C3.23263 13.311 3.23274 13.3111 3.23276 13.3112C3.23288 13.3114 3.23301 13.3116 2.59163 13.7003C1.95024 14.0891 1.95039 14.0893 1.95055 14.0896C1.95062 14.0897 1.95079 14.09 1.95093 14.0902C1.9512 14.0906 1.95151 14.0912 1.95187 14.0918C1.95258 14.0929 1.95348 14.0944 1.95454 14.0961C1.95667 14.0996 1.95949 14.1042 1.963 14.1098C1.97003 14.1211 1.97982 14.1367 1.99236 14.1563C2.01742 14.1955 2.05345 14.2508 2.10023 14.3199C2.19372 14.458 2.33045 14.6517 2.50851 14.8824C2.86379 15.3429 3.38815 15.9569 4.06692 16.5725C5.41486 17.7951 7.4395 19.0837 9.99996 19.0837V17.5837ZM2.41663 10.0003C2.41663 5.81258 5.78279 2.41699 9.99996 2.41699V0.916992C4.95046 0.916992 0.916626 4.98807 0.916626 10.0003H2.41663ZM9.99996 2.41699C12.5564 2.41699 14.4756 3.47932 15.7706 4.55958C16.4185 5.10009 16.9045 5.64089 17.2269 6.04448C17.3878 6.24587 17.5069 6.41188 17.5843 6.52492C17.623 6.5814 17.6511 6.62453 17.6688 6.65209C17.6776 6.66587 17.6837 6.67575 17.6872 6.68144C17.689 6.68429 17.6901 6.68609 17.6905 6.68681C17.6908 6.68717 17.6908 6.68726 17.6907 6.68707C17.6906 6.68698 17.6905 6.68682 17.6904 6.68659C17.6903 6.68647 17.6902 6.68625 17.6902 6.68619C17.69 6.68595 17.6899 6.68569 18.3333 6.30033C18.9767 5.91496 18.9765 5.91467 18.9764 5.91436C18.9763 5.91423 18.9761 5.9139 18.9759 5.91364C18.9756 5.91313 18.9753 5.91254 18.9749 5.91189C18.9741 5.91058 18.9731 5.90899 18.972 5.90713C18.9697 5.90339 18.9667 5.89855 18.9631 5.89263C18.9558 5.88079 18.9457 5.86465 18.9328 5.84449C18.907 5.80418 18.8701 5.74777 18.8221 5.67756C18.726 5.5372 18.585 5.34124 18.3988 5.10825C18.0272 4.64309 17.472 4.02557 16.7314 3.40774C15.2493 2.17133 13.0018 0.916992 9.99996 0.916992V2.41699ZM19.0833 6.30033V2.13366H17.5833V6.30033H19.0833ZM18.3333 5.55033H14.6333V7.05033H18.3333V5.55033ZM2.59163 14.4503H6.35829V12.9503H2.59163V14.4503ZM1.84163 13.7003V17.867H3.34163V13.7003H1.84163Z"
                                fill="white"/>
                        </svg>
                        <p>
                            Refresh
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div id="spkTable" class="w-full">
            <x-etc.spk-table :dataSpk="$edas"></x-etc.spk-table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        let active = 'edas';

        const changeSPK = (el) => {
            const node = document.getElementById('spkTable');
            const edas = document.getElementById('buttonEdas');
            const mabac = document.getElementById('buttonMabac');
            const refresh = document.getElementById('refresh');
            const checkStep = document.getElementById('checkStep');

            if (el.innerText.trim() == 'Mabac') {
                node.innerHTML = '';
                node.innerHTML = `
                <x-etc.spk-table :dataSpk="$mabac"></x-etc.spk-table>
            `;

                refresh.setAttribute('href', '/bansos/calculate/mabac');
                checkStep.setAttribute('href', '/bansos/check/mabac')
                edas.classList.remove('activeFilterButton');
                mabac.classList.add('activeFilterButton');

                active = 'mabac';

            } else {
                node.innerHTML = '';
                node.innerHTML = `
                <x-etc.spk-table :dataSpk="$edas"></x-etc.spk-table>
            `;
                refresh.setAttribute('href', '/bansos/calculate/edas');
                checkStep.setAttribute('href', '/bansos/check/edas')
                edas.classList.add('activeFilterButton');
                mabac.classList.remove('activeFilterButton');

                active = 'edas';
            }

        }

        // Fungsi untuk membersihkan tabel
        function clearTable() {
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
        }

        function addRowToTable(item, no) {
            const table = document.getElementById('dataTable');
            const row = table.insertRow(-1);

            row.innerHTML = `
        <x-table.table-row>
            <td class="firstBodyTable">${item.keluarga.id_keluarga}</td>
            <td class="bodyTable">${item.keluarga.warga.noKK}</td>
            <td class="bodyTable">${item.keluarga.warga.nama}</td>
            <td class="bodyTable">${item.keluarga.jumlah_pekerja}</td>
            <td class="bodyTable">${item.keluarga.total_pendapatan}</td>
            <td class="bodyTable">${item.keluarga.tanggungan}</td>
            <td class="bodyTable">${item.score.toFixed(2)}</td>
            <td class="bodyTable">
                <a href="/bansos/${item.keluarga.id_keluarga}" class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium xl:text-base lg:text-xs py-3 px-4 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
            </td>
        </x-table.table-row>
    `;
        }

        function debounce(func, delay) {
            let debounceTimer;
            return function () {
                const context = this;
                const args = arguments;
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => func.apply(context, args), delay);
            }
        }

        let searchFunction = debounce(async function () {
            let input;
            input = document.getElementById('searchInput');
            search = input.value;

            try {
                // Make a request to the server
                const response = await fetch(`/api/bansos/search?search=${search}&active=${active}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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

