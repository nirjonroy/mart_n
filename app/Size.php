<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	protected $fillable = [];

    public function productsize()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
