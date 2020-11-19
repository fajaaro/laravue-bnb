<?php

use App\Product;
use App\Store;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
    	$stores = Store::all();

        factory(Product::class, 150)->make()->each(function($product) use($stores) {
        	$product->store_id = $stores->random()->id;
        	$product->save();
        });
    }
}
