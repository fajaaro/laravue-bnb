<?php

namespace App\Http\Livewire\Store;

use App\Facades\Cart;
use App\Product;
use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	use WithPagination;

    public $link;
    public $store;
	public $paginate = 10;
	public $search;
	public $formVisible = false;
	public $showFormUpdate = false;

	protected $listeners = [
		'closeForm' => 'closeFormHandler',
		'productStored' => 'productStoredHandler',
		'productUpdated' => 'productUpdatedHandler',
	];

	protected $updatesQueryString = [
		[
			'search' => ['except' => '']
		]
	];

	public function mount($link)
	{
        $this->link = $link;
        $this->store = Store::where('link', $link)->first();

        if ($this->store == null) {
             return redirect()->route('shop.index');
        }

		$this->search = request()->query('search', $this->search);
	}

    public function render()
    {
    	$products = $this->search === null ? 
    					Product::where('store_id', $this->store->id)
                                ->latest()
                                ->paginate($this->paginate) : 
    					Product::where('store_id', $this->store->id)
                                ->latest()
                                ->where('title', 'like', '%' . $this->search . '%')
                                ->paginate($this->paginate); 
        
        return view('livewire.store.index', compact('products'));            
    }

    public function closeFormHandler()
    {
    	$this->formVisible = false;
    }

    public function productStoredHandler()
    {
    	$this->formVisible = false;

    	session()->flash('message', 'Your product has been stored!');    	
    }

    public function editProduct($productID) 
    {
    	$this->formVisible = true;
    	$this->showFormUpdate = true;

    	$product = Product::find($productID);

    	$this->emit('editProduct', $product);
    }

    public function productUpdatedHandler()
    {
    	$this->formVisible = false;
    	$this->showFormUpdate = false;

    	session()->flash('message', 'Your product has been updated!');
    }

    public function deleteProduct($productID)
    {
    	$product = Product::find($productID);

    	if ($product->image) {
    		Storage::delete($product->image);
    	}

    	$product->delete();

    	session()->flash('message', 'Your product has been delete!');
    }

    public function addToCart($productID)
    {
        $product = Product::find($productID);

        Cart::add($product);

        $this->emit('addToCart');
    }

    public function deleteStore()
    {
        Store::destroy(Auth::user()->store->id);
        
        return redirect()->route('shop.index');
    }
}
