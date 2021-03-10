<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\categoriesController;
use App\Http\manufactureController;
use DB;

class PaymentOfferController extends Controller
{
    public function index(){
    	return view('backEnd.PaymentOffer.add-PaymentOffer');
    }
       public function save_PaymentOffer(Request $request){
    $data = array();
    $data['payment_offer'] = $request->payment_offer;
    $data['payment_offer_short_description'] = $request->payment_offer_short_description;
    $data['publicatio_status'] = $request->publicatio_status; 
    $image = $request->file('payment_offer_logo');
    if($image){
        $image_name = rand(1, 999);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name. '.'. $ext;
        $upload_path = 'payment_offer_img/';
        $image_url = $upload_path. $image_full_name;
        $success = $image->move($upload_path, $image_full_name);
        if($success)
        {
            $data['payment_offer_logo'] = $image_url;
            DB::table('tbl_PaymentOffer')->insert($data);
            Session::put('messsa ge', 'product uploaded success');
            return Redirect::to('/add-PaymentOffer');
        }
}

        $data['payment_offer_logo'] = '';
        DB::table('tbl_PaymentOffer')->insert($data);
            Session::put('messsage', 'product uploaded success');
            return Redirect::to('/add-PaymentOffer');

    }
    public function all_PaymentOffer(){

        $all_PaymentOffer_info= DB::table('tbl_PaymentOffer')->get();
        $manage_PaymentOffer = view('backEnd.PaymentOffer.all-PaymentOffer')
        ->with('all_PaymentOffer_info', $all_PaymentOffer_info);
        return view('backEnd.layouts.master')
        ->with('backEnd.PaymentOffer.all-PaymentOffer', $manage_PaymentOffer);
    
    }
    public function unactive_PaymentOffer($payment_offer_id)
    {

     DB::table('tbl_PaymentOffer')
            ->where('payment_offer_id',$payment_offer_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-PaymentOffer');

    }
    public function active_PaymentOffer($payment_offer_id)
    {

     DB::table('tbl_PaymentOffer')
            ->where('payment_offer_id',$payment_offer_id)
            ->delete();
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-PaymentOffer');

    }
    

}
