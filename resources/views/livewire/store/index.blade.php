<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-10">
			@if ($formVisible)
				@if ($showFormUpdate)
					@livewire('product.update')
				@else
					@livewire('product.create')
				@endif
			@endif

			@if (session()->has('message'))
				<div class="alert alert-success">
					{{ session('message') }}
				</div>
			@endif
		</div>
	</div>

	@if ($store != null)
		<div class="row justify-content-center my-3">
			<div class="col-md-10">
				<span class="font-weight-bold store-name">{{ $store->name }} Store</span>
				@if ($store->user_id == Auth::user()->id)
					<button wire:click="deleteStore" class="btn btn-sm btn-danger float-right">Delete Store</button>
				@endif
			</div>
		</div>

	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header">
	                	<span>All Products</span>

						@if (!$formVisible && ($store->user_id == Auth::user()->id))
		                	<button wire:click="$toggle('formVisible')" class="btn btn-sm btn-primary float-right">Create Product</button>
						@endif
	            	</div>

	                <div class="card-body">
		                <div class="row">
		                	<div class="col">
		                		<select wire:model="paginate" class="form-control form-control-sm w-auto">
		                			<option value="5">5</option>
		                			<option value="10">10</option>
		                			<option value="15">15</option>
		                			<option value="20">20</option>
		                		</select>
		                	</div>
		                	<div class="col">
		                		<input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search product at this store">
		                	</div>
		                </div>

		                <hr>

						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Description</th>
									<th scope="col">Price</th>
									<th scope="col">Action</th>								
								</tr>
							</thead>
							<tbody>
								@forelse ($products as $product)
									<tr>
										<th scope="row">{{ $loop->iteration }}</th>
										<td>{{ $product->title }}</td>
										<td>{{ $product->description }}</td>
										<td>Rp{{ number_format($product->price, 2, ',', '.') }}</td>
										<td class="d-flex">
											@if ($store->user_id == Auth::user()->id)
												<button wire:click="editProduct({{ $product->id }})" class="btn btn-sm btn-info text-white mr-2">Edit</button>
												
												<button wire:click="deleteProduct({{ $product->id }})" class="btn btn-sm btn-danger">Delete</button>
											@else
												<button wire:click="addToCart({{ $product->id }})" class="btn btn-sm btn-info text-white">Buy</button>
											@endif
										</td>
									</tr>
								@empty
									<tr>
										<td>Empty.</td>
									</tr>
								@endforelse
							</tbody>
						</table>
						
						{{ $products->links() }}
	                </div>
	            </div>
	        </div>
	    </div>
	@endif
</div>