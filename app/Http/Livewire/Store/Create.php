<?php

namespace App\Http\Livewire\Store;

use App\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
	public $userId, $name, $link, $city, $postalCode;

    public function render()
    {
        return view('livewire.store.create');
    }

    public function store()
    {
    	$this->validate([
    		'name' => ['required'],
    		'link' => ['required'],
    		'city' => ['required'],
    		'postalCode' => ['required'],
    	]);

    	$this->userId = Auth::user()->id;

    	Store::create([
    		'user_id' => $this->userId,
    		'name' => $this->name,
    		'link' => $this->link,
    		'city' => $this->city,
    		'postal_code' => $this->postalCode,
    	]);

    	return redirect()->route('store.index', ['link' => $this->link]);
    }
}
