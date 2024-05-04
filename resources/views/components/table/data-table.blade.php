<div class="flex flex-col justify-between w-full h-full overflow-hidden">
    <table class="table-auto w-full text-sm font-medium">
        <thead class="bg-[#F5F7F9]">
        <tr class="text-Neutral/70">

            @foreach($headers as $index => $header)

                @if($index == 0)
                    <th class="py-3 pl-6 pr-3 rounded-tl-2xl text-start">{{ $header }}</th>

                @elseif($index == count($headers) - 1)
                    <th class="p-3 rounded-tr-2xl text-start">{{ $header }}</th>

                @else
                    <th class="p-3 text-start">{{ $header }}</th>
                @endif

            @endforeach

        </tr>
        </thead>
        <tbody>
        <?php $warga = [1, 2, 3, 4, 5, 6]; ?>

        @foreach($warga as $index => $data)
            <tr class="border-b">
                <td class="p-6">{{$index+1}}</td>
                <td class="p-6">Data 2</td>
                <td class="p-6">Data 2</td>
                <td class="p-6">Data 2</td>
                <td class="p-6">Data 2</td>
                <td class="p-6">Data 2</td>
                <td class="p-6">
                    <a href=""
                       class="text-Primary/10 font-medium text-base py-3 px-4 rounded-[6.25rem] bg-[#F5F7F9] w-fit">Detail</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
