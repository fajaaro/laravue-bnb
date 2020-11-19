<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
	use WithFileUploads;

	public $title;
	public $price;
	public $description;
	public $image, $imagePath;
    
    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
    	$this->validate([
    		'title' => ['required', 'min:3'],
    		'price' => ['required', 'numeric'],
    		'description' => ['required', 'max:180'],
    		'image' => ['required', 'max:1024'],
    	]);

    	if ($this->image) {
    		$this->imagePath = $this->image->store('product-image');
    	}

    	Product::create([
            'store_id' => Auth::user()->store->id,
    		'title' => $this->title,
    		'price' => $this->price,
    		'description' => $this->description,
    		'image' => $this->imagePath,
    	]);

    	$this->emit('productStored');
    }
}
