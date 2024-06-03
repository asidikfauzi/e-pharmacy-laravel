<ul class="pagination">
	@foreach ($elements as $element)
		{{-- Handle "Array of links" --}}
		@if (is_array($element))
			@foreach ($element as $page => $url)
				<li class="page-item{{ $page == $paginator->currentPage() ? ' active' : '' }}">
					<a class="page-link" href="{{ $url }}">{{ $page }}</a>
				</li>
			@endforeach
		@endif
	@endforeach
</ul>
