@if ($paginator->hasPages())
<!-- container -->
    <ul class="pagination flex justify-between mx-4 mt-4 list-reset text-grey font-bold">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- disabled href to previous -->
        @else
            <!-- href to paginator previous url -->
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <!-- disabled href to paginator->nexturl() -->
        @else
            <!-- disabled next btn -->
        @endif
    </ul>
@endif