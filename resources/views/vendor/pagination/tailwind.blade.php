@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-4 space-x-2">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                Anterior
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Anterior
            </a>
        @endif

        {{-- Pagination Links --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 text-white bg-blue-500 rounded-md">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-50">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Próximo
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                Próximo
            </span>
        @endif

    </nav>
@endif
