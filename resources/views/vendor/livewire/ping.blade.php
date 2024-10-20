@php if (! isset($scrollTo)) {
     $scrollTo = 'body';
 }

 $scrollIntoViewJsSnippet = ($scrollTo !== false)
     ? <<<JS
        (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
     JS
     : '';

@endphp
<div>
    @if ($paginator->hasPages())
        <div role="navigation"
             aria-label="{{ __('Pagination Navigation') }}"
             class="mt-6"
             id="pagination">
            <div class="flex flex-wrap -mb-1">

                @if ($paginator->onFirstPage())
                    <div class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded">
                        {!! __('pagination.previous') !!}
                    </div>
                @else
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded">
                        {!! __('pagination.previous') !!}
                    </button>
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
                            <button type="button"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded @if ($page == $paginator->currentPage()) bg-white @endif">
                                {{ $page }}
                            </button>
                        @endforeach
                    @endif
                @endforeach


                @if ($paginator->hasMorePages())
                    <button type="button"
                            wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <div class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4 border rounded">
                        {!! __('pagination.next') !!}
                    </div>
                @endif
            </div>


        </div>
    @endif
</div>
