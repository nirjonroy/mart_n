<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [];
  

    public function sizes()
    {
        return $this->belongsToMany('App\Size','productsizes')->withTimestamps();
    }
    public function colors()
    {
        return $this->belongsToMany('App\Color','productcolors')->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag','producttags')->withTimestamps();
    }
}
