<style>
    .pagination-default ul {
        list-style: none;
        display: flex;
        justify-content: center;
    }
    .pagination-default ul li {
        margin: 0 5px;
    }
    .pagination-default ul li span {
        display: inline-block;
        color: #f1a927;
        font-size: 15px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2.88px;
        border: 2px solid #f1a927;
        padding: 10px 20px;
    }
    .pagination-default ul .active-page span {
        display: inline-block;
        color: #202020;
        font-size: 15px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2.88px;
        border: 2px solid #f1a927;
        background-color: #f1a927;
        padding: 10px 20px;
    }
    .pagination-default ul li a {
        display: inline-block;
        color: #f1a927;
        font-size: 15px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2.88px;
        border: 2px solid #f1a927;
        padding: 10px 20px;
    }
</style>
@if ($paginator->hasPages())
    <nav class="pagination-default">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" class="page-arrow icon-arrow-right-linear">previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="page-arrow icon-arrow-right-linear">previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active-page" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="page-arrow icon-arrow-left-linear">next</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" class="page-arrow icon-arrow-left-linear">next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
