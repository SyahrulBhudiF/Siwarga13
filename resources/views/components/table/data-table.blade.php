<div class="flex flex-col justify-between w-full h-full overflow-hidden fade-in">
    <table class="table-auto w-full xl:text-sm lg:text-xs font-medium" id="dataTable">
        <thead class="bg-[#F5F7F9]">
        <tr class="text-Neutral/70">

            @foreach($headers as $index => $header)

                @if($index == 0)
                    <th class="py-3 pl-6 pr-3 rounded-tl-2xl text-start">{{ $header }}</th>

                @elseif($index == count($headers) - 1)
                    <th class="px-6 py-3 rounded-tr-2xl text-start">{{ $header }}</th>

                @else
                    <th class="px-6 py-3 text-start">{{ $header }}</th>
                @endif

            @endforeach

        </tr>
        </thead>
        @if($dt->isEmpty())
            <tr>
                <td colspan="7" class="text-center p-6 bg-white border-b font-medium text-Neutral/60" id="loading">
                    Data tidak ditemukan
                </td>
            </tr>
        @else
            <tbody class="transition ease-in-out duration-200" id="bodyTable">
            {{$slot}}
            </tbody>
        @endif
    </table>
    @if(Route::currentRouteName() !== 'bansos.show')
        <div class="flex justify-between items-center" id="pagin">
            <div class="flex items-center list-none gap-2">
                {{ $dt->links() }}
            </div>
            <div class="text-sm text-Neutral/70 font-normal">
                Menampilkan {{$dt->count()}} dari {{$dt->total()}} data
            </div>
        </div>
    @endif
</div>
