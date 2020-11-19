<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

	public $search;

	protected $updatesQueryString = [
		[
			'search' => ['except' => '']
		]
	];

	public function mount() 
	{
		$this->search = request()->query('search', $this->search);
	}

    public function render()
    {
    	$products = $this->search === null ?
    					Product::latest()
                            ->paginate(8) :
    					Product::latest()
                            ->where('title', 'like', '%' . $this->search . '%')
                            ->paginate(8);

        return view('livewire.shop.index', compact('products'));
    }

    public function addToCart($productID)
    {
        $product = Product::find($productID);

    	Cart::add($product);

    	$this->emit('addToCart');
    }
}
