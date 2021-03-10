<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\categoriesController;
use App\Http\manufactureController;
use DB;

class SpecialOfferController extends Controller
{
    public function index(){
    	return view('backEnd.SpecialOffer.add_SpecialOffer');
    }
    
    public function save_SpecialOffer(Request $request){
    $data = array();
    $data['special_offer_date'] = $request->special_offer_date;
     $data['special_offer'] = $request->special_offer;
    $data['special_offer_discount'] = $request->special_offer_discount;
    $data['publication_status'] = $request->publication_status; 
    $image = $request->file('special_offer_logot');
    if($image){
        $image_name = rand(1, 999);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name. '.'. $ext;
        $upload_path = 'special_offer_img/';
        $image_url = $upload_path. $image_full_name;
        $success = $image->move($upload_path, $image_full_name);
        if($success)
        {
            $data['special_offer_logot'] = $image_url;
            DB::table('tbl_SpecialOffer')->insert($data);
            Session::put('messsa ge', 'product uploaded success');
            return Redirect::to('/add-SpecialOffer');
        }
}

        $data['special_offer_logot'] = '';
        DB::table('tbl_SpecialOffer')->insert($data);
            Session::put('messsage', 'product uploaded success');
            return Redirect::to('/add-SpecialOffer');

    }
    public function all_SpecialOffer(){

        $all_SpecialOffer_info= DB::table('tbl_SpecialOffer')->get();
        $manage_SpecialOffer = view('backEnd.SpecialOffer.all-SpecialOffer')
        ->with('all_PaymentOffer_info', $all_SpecialOffer_info);
        return view('backEnd.layouts.master')
        ->with('backEnd.SpecialOffer.all-SpecialOffer', $manage_SpecialOffer);
    
    }

     public function unactive_SpecialOffer($special_offer_id)
    {

     DB::table('tbl_SpecialOffer')
            ->where('special_offer_id',$special_offer_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-SpecialOffer');

    }

    public function active_SpecialOffer($special_offer_id)
    {

     DB::table('tbl_SpecialOffer')
            ->where('special_offer_id',$special_offer_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-SpecialOffer');

    }
    
    public function delete_SpecialOffer($special_offer_id)
    {

        DB::table('tbl_SpecialOffer')
                    ->where('special_offer_id', $special_offer_id)
                    ->delete();
            Session::get('massage', 'delete success');
            return Redirect::to('/all-SpecialOffer');
    }   
}
