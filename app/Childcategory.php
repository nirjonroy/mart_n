<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    public function subcategory(){
    	return $this->belongsTo('App\Subcategory')->where('status',1);
    }
}
