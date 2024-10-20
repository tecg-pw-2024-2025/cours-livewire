@if ($paginator->hasPages())
    <div role="navigation"
         aria-label="{{ __('Pagination Navigation') }}"
         class="mt-6">
        <div class="flex flex-wrap -mb-1">

            @if ($paginator->onFirstPage())
                <div class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded">
                    {!! __('pagination.previous') !!}
                </div>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                @endif


                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}"
                           class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded
                           @if ($page == $paginator->currentPage())
                           bg-white"
                           @endif
                           aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <div class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded">
                    {!! __('pagination.next') !!}
                </div>
            @endif
        </div>


    </div>
@endif
