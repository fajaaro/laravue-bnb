<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::livewire('/create-store', 'store.create')
	->name('store.create');

Route::livewire('/store/{link}', 'store.index')
	->name('store.index');
	
Route::livewire('/shop', 'shop.index')
	->name('shop.index');

Route::livewire('/cart', 'shop.cart')
	->name('shop.cart');

Route::livewire('/checkout', 'shop.checkout')
	->name('shop.checkout');