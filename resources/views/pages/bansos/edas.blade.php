@extends('layouts.app')
@section('content')
    <x-etc.checkstep-header head="{{$data['head']}}" desc="{{$data['desc']}}"></x-etc.checkstep-header>
    <div class="flex flex-col gap-4 justify-center w-full pb-10">
        <hr>
        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Data Warga Awal</p>
            <x-table.data-table :dt="$keluarga"
                                :headers="['No.','KK', 'Kepala Keluarga', 'Jumlah Pekerja', 'Total Pendapatan', 'Tanggungan']">
                @php
                    $no = 1;
                @endphp
                @foreach($keluarga as $dt)
                    <x-table.table-row>
                        <td class="firstBodyTable">{{$no}}</td>
                        <td class="bodyTable">{{$dt->warga->noKK}}</td>
                        <td class="bodyTable">{{$dt->warga->nama}}</td>
                        <td class="bodyTable">{{$dt->jumlah_pekerja}}</td>
                        <td class="bodyTable">{{$dt->total_pendapatan}}</td>
                        <td class="bodyTable">{{$dt->tanggungan}}</td>
                    </x-table.table-row>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Bobot Kriteria</p>
            <x-table.data-table :dt="$matrix"
                                :headers="['Kriteria', 'Bobot']">
                <x-table.table-row>
                    <td class="firstBodyTable">Kriteria 1</td>
                    <td class="bodyTable">0.25</td>
                </x-table.table-row>
                <x-table.table-row>
                    <td class="firstBodyTable">Kriteria 2</td>
                    <td class="bodyTable">0.4</td>
                </x-table.table-row>
                <x-table.table-row>
                    <td class="firstBodyTable">Kriteria 3</td>
                    <td class="bodyTable">0.35</td>
                </x-table.table-row>
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Matrix Keputusan (X)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Pada matriks keputusan (X), baris menunjukkan
                alternatif dan kolom menunjukkan kriteria. Matriks
                keputusan menunjukkan kinerja dari masing-masing alternatif terhadap berbagai kriteria.</p>
            <p class="text-Neutral/100 font-bold text-sm">X</p>
            <x-table.data-table :dt="$matrix"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($matrix as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        @foreach ($row as $value)
                            <td class="bodyTable">{{ $value }}</td>
                        @endforeach
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Nilai Solusi Rata-rata (AV)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Menentukan solusi rata-rata (AV) sesuai dengan
                kriteria yang ditentukan dengan menggunakan persamaan berikut:</p>
            <img src="{{asset('img/G1.png')}}" alt="rumus" class="w-1/5 max-lg:w-1/2 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">AV</p>
            <x-table.data-table :dt="$average"
                                :headers="['Kriteria', 'Rata Rata']">
                @php($no = 1)
                @foreach ($average as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Kriteria {{ $no }}</td>
                        <td class="bodyTable">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Menentukan jarak positif (PDA) dan jarak negatif (NDA)
            </p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Menghitung jarak positif dari matriks rata-rata
                (PDA) dan jarak negatif dari matriks rata-rata (NDA) sesuai jenis kriteria (benefit dan cost) dengan
                menggunakan persamaan berikut.</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">
                Untuk kriteria ke-j yang merupakan kriteria bertipe “Benefit” maka berlaku :
            </p>
            <img src="{{asset('img/G2.png')}}" alt="rumus" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/90 font-normal text-sm -mt-3">
                Untuk kriteria ke-j yang merupakan kriteria bertipe “Cost” maka berlaku :</p>
            <img src="{{asset('img/G3.png')}}" alt="rumus" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">PDA</p>
            <x-table.data-table :dt="$pda"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($pda as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        @foreach ($row as $value)
                            <td class="bodyTable">{{ $value }}</td>
                        @endforeach
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-bold text-sm">NDA</p>
            <x-table.data-table :dt="$nda"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($nda as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        @foreach ($row as $value)
                            <td class="bodyTable">{{ $value }}</td>
                        @endforeach
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Menentukan jumlah terbobot (SP dan SN)
            </p>
            <img src="{{asset('img/G4.png')}}" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">SP</p>
            <x-table.data-table :dt="$sp"
                                :headers="['Alternatif' ,'SP']">
                @php($no = 1)
                @foreach ($sp as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        <td class="bodyTable">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-bold text-sm">SN</p>
            <x-table.data-table :dt="$sn"
                                :headers="['Alternatif' ,'SP']">
                @php($no = 1)
                @foreach ($sn as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        <td class="bodyTable">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Desc : Menghitung nilai normalisasi dari SP dan SN untuk
                semua alternatif.
            </p>
            <img src="{{asset('img/G5.png')}}" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">NSP</p>
            <x-table.data-table :dt="$nsp"
                                :headers="['Alternatif' ,'SP']">
                @php($no = 1)
                @foreach ($nsp as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        <td class="bodyTable">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-bold text-sm">NSN</p>
            <x-table.data-table :dt="$nsn"
                                :headers="['Alternatif' ,'SP']">
                @php($no = 1)
                @foreach ($nsn as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Alt {{ $no }}</td>
                        <td class="bodyTable">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Menghitung nilai skor penilaian (AS) dan melakukan
                Ranking</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Setelah nilai normalisasi NSP dan NSN
                diperoleh, maka dihitung nilai penilaian atau Appraisal Score (AS) sebagai berikut:
            </p>
            <img src="{{asset('img/G6.png')}}" class="w-1/4 max-lg:w-full">
            <p class="text-Neutral/100 font-bold text-sm">AS</p>
            <x-table.data-table :dt="$rankEdas"
                                :headers="['Rank.', 'KK', 'Kepala Keluarga', 'Score']">
                @php($no = 1)
                @foreach($rankEdas as $dt)
                    <x-table.table-row>
                        <td class="firstBodyTable">{{$no}}</td>
                        <td class="bodyTable">{{$dt->keluarga->warga->noKK}}</td>
                        <td class="bodyTable">{{$dt->keluarga->warga->nama}}</td>
                        <td class="bodyTable">{{$dt->score}}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>
    </div>
@endsection
