<?php

namespace App\Http\Controllers\search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;

class liveSearchController extends Controller
{
	 public function SearchWithoutData()
	 {
	  
	 }

    
    public function SearchData($keyword)
    {

    		// $data['show_datas'] = DB::table('products')
    		// 			->join('productimages','productimages.product_id','=','products.id')
    		// 			->where('products.proName','LIKE','%'.$keyword."%")->get()

    								// return $data;

	     $data['show_datas'] = Product::where('productname','LIKE','%'.$keyword."%")->get();
		    $data = view('frontEnd.layouts.pages.search', $data)->render();
		    if ($data != '') 
		    {
		    	 echo $data;
		    }
     }

     
}
