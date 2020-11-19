<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
	use WithFileUploads;

	public $productID;
	public $title;
	public $price;
	public $description;
	public $image, $imagePath, $hasOldImage, $oldImage;

	protected $listeners = [
		'editProduct' => 'editProductHandler'
	];

    public function render()
    {
        return view('livewire.product.update');
    }

    public function editProductHandler($product) {
    	$this->productID = $product['id'];
    	$this->title = $product['title'];
    	$this->price = $product['price'];
    	$this->description = $product['description'];

        if ($product['image'] == null) $this->hasOldImage = false;
        else {
            $this->hasOldImage = true;
            $this->oldImage = asset('/storage/' . $product['image']);
        }
    }

    public function update() {
    	$this->validate([
    		'title' => ['required', 'min:3'],
    		'price' => ['required', 'numeric'],
    		'description' => ['required', 'max:180'],
    		'image' => ['max:1024'],
    	]);

    	$product = Product::find($this->productID);

    	if ($this->image) {
    		$this->imagePath = $this->image->store('product-image');

    		Storage::delete($product->image);
    	} else {
    		$this->imagePath = $product->image;
    	}

    	$product->update([
    		'title' => $this->title,
    		'price' => $this->price,
    		'description' => $this->description,
    		'image' => $this->imagePath
    	]);

    	$this->emit('productUpdated');
    }
}
