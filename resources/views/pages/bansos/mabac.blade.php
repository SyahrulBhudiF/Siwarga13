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
            <p class="text-Neutral/100 font-normal text-base">Nilai Max dan Min Kriteria</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : </p>
            <p class="text-Neutral/100 font-bold text-sm">MAX & MIN</p>
            <x-table.data-table :dt="$matrix"
                                :headers="['Nilai', 'Bobot']">
                <x-table.table-row>
                    <td class="firstBodyTable">Nilai Max</td>
                    <td class="bodyTable">{{$max[0]}}</td>
                </x-table.table-row>
                <x-table.table-row>
                    <td class="firstBodyTable">Nilai Min</td>
                    <td class="bodyTable">{{$min[0]}}</td>
                </x-table.table-row>
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Normalisasi matriks keputusan (X)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc Element matriks ternormalisasi diperoleh
                dengan menerapkan rumus berikut.
            </p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Untuk kriteria ke-j yang merupakan kriteria bertipe
                “Benefit” maka berlaku :</p>
            <img src="{{asset('img/G7.png')}}" alt="" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Sedangkan untuk kriteria ke-j yang merupakan kriteria
                bertipe “Cost” maka berlaku :
            </p>
            <img src="{{asset('img/G8.png')}}" alt="" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/90 font-normal text-sm -mt-3">𝑥𝑖+ = mewakili nilai maksimum dari alternatif.
            </p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">𝑥𝑖- = mewakili nilai minimum dari alternatif.
            </p>
            <p class="text-Neutral/100 font-bold text-sm">Normalisasi matriks X</p>
            <x-table.data-table :dt="$normalizedX"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($normalizedX as $row)
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
            <p class="text-Neutral/100 font-normal text-base">Perhitungan elemen matriks tertimbang (V)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Elemen matriks tertimbang (V) dihitung
                berdasarkan rumus berikut.
            </p>
            <img src="{{asset('img/G9.png')}}" alt="" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">V</p>
            <x-table.data-table :dt="$weightV"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($weightV as $row)
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
            <p class="text-Neutral/100 font-normal text-base">Matriks area perkiraan batas (G)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Perhitungan ini merupakan perbedaan elemen
                matriks tertimbang (V) dan nilai daerah perkiraan perbatasan (G).
            </p>
            <img src="{{asset('img/G10.png')}}" alt="" class="w-1/5 max-lg:w-1/2">
            <p class="text-Neutral/100 font-bold text-sm">G</p>
            <x-table.data-table :dt="$limitsG"
                                :headers="['Kriteria' ,'Martix batas (G)']">
                @php($no = 1)
                @foreach ($limitsG as $row)
                    <x-table.table-row>
                        <td class="firstBodyTable">Kriteria {{ $no }}</td>
                        <td class="bodyTable text">{{ $row }}</td>
                    </x-table.table-row>
                    @php($no++)
                @endforeach
            </x-table.data-table>
        </div>

        <div class="flex flex-col gap-4">
            <p class="text-Neutral/100 font-normal text-base">Perhitungan matriks jarak elemen alternatif dari batas
                perkiraan daerah (Q)</p>
            <p class="text-Neutral/90 font-normal text-sm -mt-3">Desc : Perhitungan nilai - nilai fungsi kriteria dengan
                alternatif diperoleh dengan menjumlahkan elemen matriks Q.
            </p>
            <img src="{{asset('img/G11.png')}}" alt="" class="w-1/6 max-lg:w-1/3">
            <p class="text-Neutral/100 font-bold text-sm">Q</p>
            <x-table.data-table :dt="$distanceQ"
                                :headers="['Alternatif' ,'Kriteria 1', 'Kriteria 2', 'Kriteria 3']">
                @php($no = 1)
                @foreach ($distanceQ as $row)
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
            <p class="text-Neutral/100 font-normal text-base">Perangkingan alternatif</p>
            <p class="text-Neutral/90 font-normal text-base">Perangkingan nilai skor penilaian S dari nilai yang
                tertinggi hingga yang terendah. Alternatif dengan nilai yang tertinggi menunjukkan alternatif yang
                terbaik.
            </p>
            <img src="{{asset('img/G12.png')}}" alt="" class="w-1/6 max-lg:w-1/3">
            <p class="text-Neutral/100 font-bold text-sm">Rank</p>
            <x-table.data-table :dt="$rankMabac"
                                :headers="['Rank.', 'KK', 'Kepala Keluarga', 'Score']">
                @php($no = 1)
                @foreach($rankMabac as $dt)
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
