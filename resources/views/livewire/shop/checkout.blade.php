<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body">
					@if ($formCheckout)
						<form wire:submit.prevent="checkout" method="post">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputFirstName">First Name</label>
									<input wire:model.lazy="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" id="inputFirstName" placeholder="First Name">

									@error('firstName')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

							  	</div>
								<div class="form-group col-md-6">
									<label for="inputLastName">Last Name</label>
									<input wire:model.lazy="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" id="inputLastName" placeholder="Last Name">

									@error('lastName')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

								</div>
							</div>
						  	
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail">Email</label>
									<input wire:model.lazy="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email">

									@error('email')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

							  	</div>
								<div class="form-group col-md-6">
									<label for="inputPhone">Phone</label>
									<input wire:model.lazy="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Phone">

									@error('phone')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

								</div>
							</div>

							<div class="form-group">
						    	<label for="inputAddress">Address</label>
						    	<input wire:model.lazy="address" type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="Address">

								@error('address')
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

						  	</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputCity">City</label>
									<input wire:model.lazy="city" type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" placeholder="city">

									@error('city')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

							  	</div>
								<div class="form-group col-md-6">
									<label for="inputPostalCode">Postal Code</label>
									<input wire:model.lazy="postalCode" type="text" class="form-control @error('postalCode') is-invalid @enderror" id="inputPostalCode" placeholder="Postal Code">

									@error('postalCode')
										<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

								</div>
							</div>
							
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					@else
						<button wire:click="$emit('payment', '{{ $snapToken }}')" class="btn btn-primary">Checkout</button>
						<script>
							window.livewire.on('payment', snapToken => {
								snap.pay(snapToken, {
									onSuccess: result => {
										window.livewire.emit('emptyCart')
										window.location.href = '/shop'
									},
									onPending: result => {
										location.reload()
									},
									onError: result => {
										location.reload()
									},								
								})
							})
						</script>
					@endif

	            </div>
            </div>
        </div>
    </div>
</div>