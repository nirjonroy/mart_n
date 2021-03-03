<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[];
    public function comments(){
    	return $this->hasMany('App\Comment')->where('status',1);
    }
}
