<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
	public $firstName = "Fajar", $lastName = "Fajar", $email = "Fajar@gmail.com", 
           $phone = "808", $address = "Fajar", $city = "Fajar", $postalCode = "12770";
	public $formCheckout;
	public $snapToken;

	protected $listeners = [
		'emptyCart' => 'emptyCartHandler',
	];

	public function mount()
	{
		$this->formCheckout = true;
	}

    public function render()
    {
        return view('livewire.shop.checkout');
    }

    public function checkout()
    {
    	$this->validate([
    		'firstName' => ['required'],
    		'lastName' => ['required'],
    		'email' => ['required', 'email'],
    		'phone' => ['required'],
    		'address' => ['required'],
    		'city' => ['required'],
    		'postalCode' => ['required'],
    	]);

    	$cart =  Cart::get()['products'];

    	$amount = array_sum(
    		array_column(
    			$cart, 
    			'price'
    		)
    	);

    	$customerDetails = [
    		'first_name' => $this->firstName,
    		'last_name' => $this->lastName,
    		'email' => $this->email,
    		'phone' => $this->phone,
    		'address' => $this->address,
    		'city' => $this->city,
    		'postalCode' => $this->postalCode,
    	];

    	$transactionDetails = [
    		'order_id' => uniqid(),
    		'gross_amount' => $amount,
    	];

    	$payload = [
    		'transaction_details' => $transactionDetails,
    		'customer_details' => $customerDetails,
    	];

    	$this->formCheckout = false;

    	\Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
		\Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
		\Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
		\Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

		$snapToken = \Midtrans\Snap::getSnapToken($payload);
		$this->snapToken = $snapToken;
    }

    public function emptyCartHandler()
    {
    	Cart::clear();
    	$this->emit('cartClear');
    }
}
