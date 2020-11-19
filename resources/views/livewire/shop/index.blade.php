<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 class="my-3">All Products</h4>
        </div>
    </div>    

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col"></div>
                <div class="col-md-5">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search Product">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                @foreach ($products as $product)
                <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 mb-4">
                    <div class="card h-80">
                        <img class="card-img-top img-fluid product-image" src="{{ $product->image ? asset('/storage/' . $product->image) : 'http://placehold.it/150x150' }}" alt="">
                        <div class="card-img-overlay" style="background-color: rgba(0,0,0,0.5);">
                            <h6 class="text-white">
                                <strong>{{ $product->title }}</strong>
                            </h6>
                            <p class="text-white">Rp{{ number_format($product->price,2,",",".") }}</p>
                            <p class="text-white product-description">
                                {{ substr($product->description, 0, 60) }}
                            </p>
                            <small class="text-white">Store Location: {{ $product->store->city }}</small>
                            <button wire:click="addToCart({{ $product->id }})" type="button" class="btn btn-sm btn-block btn-success text-white mt-2">Add to cart</button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $products->links() }}
        </div>
    </div>


</div>