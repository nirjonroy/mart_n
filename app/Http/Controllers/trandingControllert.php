<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\categoriesController;
use App\Http\manufactureController;
use DB;

class trandingControllert extends Controller
{
    public function index(){

    	return view('backEnd.tranding.add-tranding');
    }
    public function save_tranding(Request $request){
    $data = array();
    $data['payment_offer'] = $request->payment_offer;
    $data['tranding_product_oldprice'] = $request->tranding_product_oldprice;
    $data['tranding_product_name_new_price'] = $request->tranding_product_name_new_price;

    $data['publication_status'] = $request->publication_status; 
    $image = $request->file('tranding_product_image');
    if($image){
        $image_name = rand(1, 999);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name. '.'. $ext;
        $upload_path = 'trending_imgs/';
        $image_url = $upload_path. $image_full_name;
        $success = $image->move($upload_path, $image_full_name);
        if($success)
        {
            $data['tranding_product_image'] = $image_url;
            DB::table('tbl_tranding_items')->insert($data);
            Session::put('messsa ge', 'product uploaded success');
            return Redirect::to('/add-tranding');
        }
}

        $data['tranding_product_image'] = '';
        DB::table('tbl_tranding_items')->insert($data);
            Session::put('messsage', 'product uploaded success');
            return Redirect::to('/add-tranding');

    }
    
    public function all_tranding(){
        $all_tranding_info= DB::table('tbl_tranding_items')->get();
        $manage_tranding = view('backEnd.tranding.all-tranding')
        ->with('all_tranding_info', $all_tranding_info);
        return view('backEnd.layouts.master')
        ->with('backEnd.tranding.all-tranding', $manage_tranding);
    }
    public function unactive_tranding($tranding_id)
    {

     DB::table('tbl_tranding_items')
            ->where('tranding_id',$tranding_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-tranding');

    }

    public function active_tranding($tranding_id)
    {

     DB::table('tbl_tranding_items')
            ->where('tranding_id',$tranding_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-tranding');

    }
    public function delete_tranding($tranding_id)
    {

        DB::table('tbl_tranding_items')
                    ->where('tranding_id', $tranding_id)
                    ->delete();
            Session::get('massage', 'delete success');
            return Redirect::to('/all-tranding');
    }   

   
}
