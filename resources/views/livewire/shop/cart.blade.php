<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body pb-0">
					<table class="table mb-0">
						<thead class="thead-dark">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($cart['products'] as $product)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $product->title }}</td>
									<td>Rp{{ number_format($product->price,2,",",".") }}</td>
									<td>
										<button wire:click="removeFromCart({{ $loop->index }})" class="btn btn-sm btn-danger float-right">Remove</button>
									</td>
								</tr>
							@empty
								<tr>
									<td>Empty.</td>
								</tr>
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4">
									<a href="{{ route('shop.checkout') }}">
										<button class="btn btn-primary float-right">Checkout</button>
									</a>
								</td>
							</tr>
						</tfoot>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>