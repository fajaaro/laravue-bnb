<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Store</div>

                <div class="card-body">
					<form wire:submit.prevent="store" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputName">Name</label>
								<input wire:model.lazy="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Store name">

								@error('name')
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

						  	</div>
							<div class="form-group col-md-6">
								<label for="inputLink">Link</label>
								<input wire:model.lazy="link" type="text" class="form-control @error('link') is-invalid @enderror" id="inputLink" placeholder="Store link">

								@error('link')
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>
						</div>
					  	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">City</label>
								<input wire:model.lazy="city" type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" placeholder="City">

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
                </div>
            </div>
        </div>
    </div>
</div>
