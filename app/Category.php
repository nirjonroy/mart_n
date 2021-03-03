<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable=[];
    public function subcategories(){
    	return $this->hasMany('App\Subcategory')->where('status',1);
    }
}
