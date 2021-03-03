<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Customer;
use App\Seller;
use App\Product;
use DB;
use Cart;
use File;
class ReportsController extends Controller
{
    public function customers(){
    	$customers = Customer::get();
    	return view('backEnd.reports.customer',compact('customers'));
    }
    public function customerinactive(Request $request){
        $inactive_data           =   Customer::find($request->hidden_id);
        $inactive_data->status   =   0;
        $inactive_data->save();
        Toastr::success('message', 'Customer inactive successfully!');
        return redirect('admin/registared/customer');   
    }
    public function customeractive(Request $request){
        $active_data         =   Customer::find($request->hidden_id);
        $active_data->status =   1;
        $active_data->save();
        Toastr::success('message', 'Customer active successfully!');
        return redirect('admin/registared/customer');   
    }

    // customer information end

    public function sellerinfoupdate(Request $request){
       $this->validate($request,[
            'shopname' => 'required',
            'sellerphone' => 'required',
            'selleremail' => 'required',
        ]);
       $update_seller = Seller::where('id',$request->hidden_id)->first();

      $update_shopbanner = $request->file('shopbanner');
      if ($update_shopbanner) {
         $file2 = $request->file('shopbanner');
          File::delete(public_path() . 'public/uploads/shopbanner', $update_seller->shopbanner); 
          $name2 = time().'-'.$file2->getClientOriginalName();
          $uploadPath2 = 'public/uploads/shopbanner/';
          $file2->move($uploadPath2,$name2);
          $fileUrl2 =$uploadPath2.$name2;
      }else{
          $fileUrl2 = $update_seller->shopbanner;
      }

        $update_seller->selleremail = $request->selleremail;
        $update_seller->shopname = $request->shopname;
        $update_seller->slug =  strtolower(preg_replace('/\s+/u', '-', trim($request->shopname)));
        $update_seller->contperson = $request->contperson;
        $update_seller->shopbanner = $fileUrl2;
        $update_seller->sellerphone = $request->sellerphone;
        $update_seller->sellerphone2 = $request->sellerphone2;
        $update_seller->selleraddress = $request->selleraddress;
        $update_seller->status = $request->status;
        $update_seller->publishproduct = $request->publishproduct;
        $update_seller->commisiontype = $request->commisiontype;
        $update_seller->commision = $request->commision;
        $update_seller->featurevandor = $request->featurevandor;
        $update_seller->password = bcrypt(request('password'));
        $update_seller->save();
        Toastr::success('message', 'Seller Info Update successfully!');
        return redirect()->back();
    }
   
}
