<?php

namespace App\Providers;

use App\Helpers\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {
        App::bind('cart', function() {
            return new Cart();
        });
    }

    public function boot()
    {
        
    }
}
