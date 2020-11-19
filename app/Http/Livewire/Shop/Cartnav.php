<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Cartnav extends Component
{
	public $totalCart = 0;

	protected $listeners = [
		'addToCart' => 'updateTotalCart',
		'removeFromCart' => 'updateTotalCart',
		'cartClear' => 'updateTotalCart',
	];

	public function mount()
	{
		$this->updateTotalCart();
	}

    public function render()
    {
        return view('livewire.shop.cartnav');
    }

    public function updateTotalCart()
    {
    	$this->totalCart = count(Cart::get()['products']);
    }
}
