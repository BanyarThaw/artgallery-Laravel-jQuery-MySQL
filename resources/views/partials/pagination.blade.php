@if ($paginator->hasPages())
    <ul class="pagination pagination-separated pagination-sm mb-0">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a href="#" class="page-link">←</a>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link">←</a>
            </li>
        @endif

        @foreach($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a href="#" class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link">→</a>
            </li>
        @else
            <li class="page-item disabled">
                <a href="#" class="page-link">→</a>
            </li>
        @endif
    </ul>
@endif