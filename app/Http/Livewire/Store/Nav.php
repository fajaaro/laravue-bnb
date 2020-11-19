<?php

namespace App\Http\Livewire\Store;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Nav extends Component
{
	public $user;
	public $hasStore;

	public function mount()
	{
		$this->user = Auth::user();

		if ($this->user->store) $this->hasStore = true;
		else $this->hasStore = false;
	}

    public function render()
    {
        return view('livewire.store.nav');
    }
}
