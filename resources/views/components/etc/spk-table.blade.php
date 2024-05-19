<x-table.data-table :dt="$dataSpk"
                    :headers="['Rank.', 'KK', 'Kepala Keluarga', 'Jumlah Pekerja', 'Total Pendapatan', 'Tanggungan','Score', 'Aksi']">
    @php
        $no = ($dataSpk->currentPage() - 1) * $dataSpk->perPage() + 1;
    @endphp
    @foreach($dataSpk as $dt)
        <x-table.table-row>
            <td class="firstBodyTable">{{$no}}</td>
            <td class="bodyTable">{{$dt->keluarga->warga->noKK}}</td>
            <td class="bodyTable">{{$dt->keluarga->warga->nama}}</td>
            <td class="bodyTable">{{$dt->keluarga->jumlah_pekerja}}</td>
            <td class="bodyTable">{{$dt->keluarga->total_pendapatan}}</td>
            <td class="bodyTable">{{$dt->keluarga->tanggungan}}</td>
            <td class="bodyTable">{{$dt->score}}</td>
            <td class="bodyTable">
                <a href="{{ route('bansos.show', $dt->keluarga->id_keluarga) }}"
                   class="text-Primary/10 active:brightness-95 transition ease-in-out duration-300 font-medium xl:text-base lg:text-xs py-3 px-4 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
            </td>
        </x-table.table-row>
        @php
            $no++;
        @endphp
    @endforeach
</x-table.data-table>
