<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $fillable = [];

   public function productcolor()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
