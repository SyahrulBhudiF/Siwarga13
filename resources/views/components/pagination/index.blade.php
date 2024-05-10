{{-- Pagination Elements --}}
@foreach ($elements as $element)
    {{-- Array Of Links --}}
    @if (is_array($element))

        @php
            $start = $paginator->currentPage() - 1; // Start displaying links from this page number
            $end = $paginator->currentPage() == 1 ? $start + 3 : $start + 2; // End displaying links at this page number
        @endphp

        @if ($paginator->currentPage() > 1)
            <a
                    class="py-2 px-4 buttonAnimation text-Neutral/70 rounded-[0.5rem] border border-Neutral/30 text-base transition ease-in-out duration-200"
                    href="{{ $paginator->url($paginator->currentPage() - 1) }}">{{ $paginator->currentPage() - 1 }}</a>
        @endif

        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <span
                        class="page-link py-2 px-4 bg-Neutral/20 rounded-[0.5rem] text-Neutral/100 text-base border border-Neutral/30 transition ease-in-out duration-200 active">{{ $page }}</span>
            @elseif ($page > $paginator->currentPage() && $page <= $end)
                <a class="page-link py-2 px-4 text-Neutral/70 buttonAnimation rounded-[0.5rem] border border-Neutral/30 text-base transition ease-in-out duration-200"
                   href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->currentPage() + 1 < $paginator->lastPage())
            <li class="py-2 px-4 text-Neutral/70 rounded-[0.5rem] border border-Neutral/30 text-base transition ease-in-out duration-200">
                <span class="page-link">...</span>
            </li>
        @endif

    @endif
@endforeach
