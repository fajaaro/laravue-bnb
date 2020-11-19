<?php

use App\Store;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 1)->states('user-fajar')->create()->each(function($user) {
        	$user->store()->save(factory(Store::class)->make());
        });

        factory(User::class, 6)->create()->each(function($user) {
        	$user->store()->save(factory(Store::class)->make());
        });
    }
}
