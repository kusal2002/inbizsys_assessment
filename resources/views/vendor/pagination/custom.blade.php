@if ($paginator->hasPages())
    <div class="flex space-x-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button disabled
                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-300 bg-white border border-slate-200 rounded cursor-not-allowed">
                Prev
            </button>
        @else
            <button wire:click="previousPage"
                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                Prev
            </button>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button disabled class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500">
                    {{ $element }}
                </button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button disabled
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded">
                            {{ $page }}
                        </button>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage"
                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                Next
            </button>
        @else
            <button disabled
                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-300 bg-white border border-slate-200 rounded cursor-not-allowed">
                Next
            </button>
        @endif
    </div>
@endif
