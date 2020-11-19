<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function products()
    {
    	return $this->hasMany('App\Product')->orderBy('created_at', 'desc');
    }
}
