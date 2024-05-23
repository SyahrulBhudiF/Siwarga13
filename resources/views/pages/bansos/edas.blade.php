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
            <p class="text-Neutral/100 font-normal text-base">Menghitung Jarak Positif (PDA)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung Jarak Negatif (NDA)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung jumlah terbobot PDA (SP)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung jumlah terbobot NDA (SN)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung nilai normalisasi SP (NSP)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung nilai normalisasi SN (NSN)</p>
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
            <p class="text-Neutral/100 font-normal text-base">Menghitung nilai skor penilaian (AS)</p>
            <x-table.data-table :dt="$rankEdas"
                                :headers="['Rank.', 'KK', 'Kepala Keluarga', 'Score']">
                @foreach($rankEdas as $dt)
                    <x-table.table-row>
                        <td class="firstBodyTable">{{$dt->id_rankEdas}}</td>
                        <td class="bodyTable">{{$dt->keluarga->warga->noKK}}</td>
                        <td class="bodyTable">{{$dt->keluarga->warga->nama}}</td>
                        <td class="bodyTable">{{$dt->score}}</td>
                    </x-table.table-row>
                @endforeach
            </x-table.data-table>

        </div>
    </div>
@endsection
