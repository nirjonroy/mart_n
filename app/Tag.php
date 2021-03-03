<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function producttag()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

}
