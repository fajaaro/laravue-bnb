<div class="mb-3">
	<h3 class="font-weight-bold mb-3">Edit Product</h3>

	<form wire:submit.prevent="update" method="post" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputTitle">Title</label>
				<input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="Product Title">

				@error('title')
					<span class="invalid-feedback">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

		  	</div>
			<div class="form-group col-md-6">
				<label for="inputPrice">Price</label>
				<input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Product Price">

				@error('price')
					<span class="invalid-feedback">
						<strong>{{ $message }}</strong>
					</span>
				@enderror

			</div>
		</div>
	  	
	  	<div class="form-group">
	    	<label for="inputDescription">Description</label>
	    	<input wire:model="description" type="text" class="form-control @error('description') is-invalid @enderror" id="inputDescription" placeholder="Product Description">

			@error('description')
				<span class="invalid-feedback">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

	  	</div>
		
		<div class="form-group">
			<label for="inputImage">Image</label>
			<input wire:model="image" type="file" class="form-control-file @error('image') is-invalid @enderror" id="inputImage">

			@error('image')
				<span class="invalid-feedback">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

			@if ($image)
				<img src="{{ $image->temporaryUrl() }}" width="200" height="200" class="mt-2">
			@elseif ($hasOldImage)
				<img src="{{ $oldImage }}" width="200" height="200" class="mt-2">
			@endif
	
		</div>
		
		<button type="submit" class="btn btn-primary">Save</button>
		<button wire:click="$emit('closeForm')" type="button" class="btn btn-dark">Cancel</button>
	</form>
</div>
