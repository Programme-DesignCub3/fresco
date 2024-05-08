@if ($article->hasPages())
  <ul
    class="flex items-center justify-center gap-x-3 text-lg font-medium text-fr-black dark:text-white">
    {{-- First Page Link --}}
    @if ($article->onFirstPage())
      <li class="disabled"><span>&lt;&lt;</span></li>
    @else
      <li><a href="{{ $article->url(1) }}" rel="prev">&lt;&lt;</a></li>
    @endif

    {{-- Previous Page Link --}}
    @if ($article->onFirstPage())
      <li class="disabled"><span>&lt;</span></li>
    @else
      <li><a href="{{ $article->previousPageUrl() }}" rel="prev">&lt;</a></li>
    @endif

    {{-- Middle Page Link --}}
    @foreach (range(1, $article->lastPage()) as $i)
      @if ($i >= $article->currentPage() - 2 && $i <= $article->currentPage() + 2)
        @if ($i == $article->currentPage())
          <li
            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-fr-red text-center text-white">
            <span>{{ $i }}</span>
          </li>
        @else
          <li><a href="{{ $article->url($i) }}">{{ $i }}</a></li>
        @endif
      @endif
    @endforeach

    {{-- Next Page Link --}}

    @if ($article->hasMorePages())
      <li><a href="{{ $article->nextPageUrl() }}" rel="next">></a></li>
    @else
      <li class="disabled"><span>></span></li>
    @endif

    {{-- Last Page Link --}}

    @if ($article->hasMorePages())
      <li>
        <a href="{{ $article->url($article->lastPage()) }}" rel="next">>></a>
      </li>
    @else
      <li class="disabled"><span>>></span></li>
    @endif
  </ul>
@endif
