<div>
	@if ($hasStore)
		<a href="{{ route('store.index', ['link' => $user->store->link]) }}" class="dropdown-item">My Store</a>
	@else
		<a href="{{ route('store.create') }}" class="dropdown-item">Build Store</a>		
	@endif
</div>
