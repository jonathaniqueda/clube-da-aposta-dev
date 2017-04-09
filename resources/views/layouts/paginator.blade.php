@php
$linkLimit = 5
@endphp

@if($paginator->lastPage() > 1)
    <div class="text-center">
        <ul class="pagination">
            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $paginator->currentPage() == 1 ? 'javascript:void(0)' : $paginator->url(1) }}">Primeira</a>
            </li>

            @for($i = 1; $i <= $paginator->lastPage(); $i++)

                @php
                $halfTotalLinks = floor($linkLimit / 2);
                $from = $paginator->currentPage() - $halfTotalLinks;
                $to = $paginator->currentPage() + $halfTotalLinks;
                if ($paginator->currentPage() < $halfTotalLinks) {
                $to += $halfTotalLinks - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $halfTotalLinks) {
                $from -= $halfTotalLinks - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                @endphp

                @if($from < $i && $i < $to)
                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif

            @endfor

            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)' : $paginator->url($paginator->lastPage()) }}">Última</a>
            </li>

        </ul>
    </div>
@endif