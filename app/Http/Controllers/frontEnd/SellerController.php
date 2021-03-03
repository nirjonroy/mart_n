<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
Use App\Seller;
Use App\Brand;
Use App\Brandinsert;
Use App\Product;
Use App\Orderdetails;
use Mail;
use DB;
use File;
use Auth;
use Session;
class SellerController extends Controller
{
  public function validSeller(){
        $checkSeller= Session::get('SellerId');
        $sellerInfo=Seller::find($checkSeller);
        return $sellerInfo;
    }

    public function sellerregister(){
        return view('frontEnd.layouts.pages.seller.register');
    }
    public function ordermanage(){
        $sellerId= Session::get('SellerId');
        $ordermanage = DB::table('orderdetails')
        ->join('orders', 'orderdetails.orderId', '=', 'orders.orderIdPrimary')
        ->join('products', 'orderdetails.productId', '=', 'products.id')
        ->where('orderdetails.sellerid',$sellerId)
        ->select('orderdetails.*','products.id as pid','orders.orderStatus')
        ->get();
        return view('frontEnd.layouts.pages.seller.ordermanage',compact('ordermanage'));
    }
    public function sellersave(Request $request){
    	$this->validate($request,[
    		'shopname' => 'required|unique:sellers',
    		'sellerphone' => 'required|unique:sellers',
    		'selleremail' => 'required|unique:sellers',
    	]);
        $verifyToken = rand(111111,999999);
        $password = Str_random(7);
    	$store_data           	  = 	new Seller();
        $store_data->shopname     =     $request->shopname;
    	$store_data->slug      	  = 	 strtolower(preg_replace('/\s+/u', '-', trim($request->shopname)));
    	$store_data->selleremail  = 	$request->selleremail;
    	$store_data->sellerphone  = 	$request->sellerphone;
    	$store_data->agree  	    = 	1;
        $store_data->verify       =   $verifyToken;
        $store_data->password = bcrypt($password);
    	$store_data->status  	    = 	0;
    	$store_data->save();

    	// initial information send to email
        $data = array(
            'shopname' => $request->shopname,
            'sellerid' => $store_data->id,
            'slug'     =>  $store_data->slug,
            'email'    =>   $request->selleremail,
            'verifyToken' => $verifyToken,
            'password' => $password,
            );
        $send = Mail::send('frontEnd.emails.seller.accountverify', $data, function($textmsg) use ($data){
          $textmsg->to($data['email']);
          $textmsg->subject('Account Confirmation Mail');
        });
        Session::put('initialPassword',$password);
    	return redirect('/')->with('success','Thanks, Account created successfuly, Please check your mail and verify account');
    }

    public function sellerlogin(){
        return view('frontEnd.layouts.pages.seller.login');
    }

    public function sellerverifyPage($slug,$sellerid,$verifyToken){
        $verified=Seller::where('id',$sellerid)->first();
        $verifyformtoken= $verified->verify;
       if($verifyToken==$verifyformtoken){
           $verified=Seller::where('id',$sellerid)->first();
            $password = Session::get('initialPassword');
            $verified->verify = 1;
            $verified->status = 1;
            $verified->save();

           // initial information send to email
            $data = array(
            'shopname' =>   $verified->shopname,
            'email'    =>   $verified->selleremail,
            'password'    => $password,
            );
          $send = Mail::send('frontEnd.emails.seller.sellerverified', $data, function($textmsg) use ($data){
            $textmsg->to($data['email']);
            $textmsg->subject('Account Confirmation Mail');
          });
         Session::forget('initialPassword');   
         return redirect('login/seller')->with('success','Thanks! your account verified. Please check your email for Login Useremail and Password');
       }else{
        return redirect()->back()->with('error','Opps! your verify token wrong');
       }
    }
    public function sellerauthlog(Request $request){
        $this->validate($request,[
            'phoneOremail' => 'required',
            'password' => 'required',
        ]);
       $sellerCheck = Seller::orWhere('selleremail',$request->phoneOremail)
       ->orWhere('sellerphone',$request->phoneOremail)
       ->first();
        if($sellerCheck){
          if($sellerCheck->status == 0){
             return redirect()->back()->with('warning','Opps! your account has been suspends');
         }else{
          if(password_verify($request->password,$sellerCheck->password)){
              $SellerId = $sellerCheck->id;
               Session::put('SellerId',$SellerId);
               Session::forget('customerId');
              return redirect('/me/seller')->with('success','Thanks , You are login successfully');
            
          }else{
              return redirect()->back()->with('error','Opps! your password wrong');
          }

           }
        }else{
          return redirect()->back()->with('warning','Sorry! You have no account');
        }
       
    }

    public function sellerdashboard(){
      if($this->validSeller()){
        $totalProduct = Product::where('sellerid',Session::get('SellerId'))->count();
        $totalSell = Orderdetails::where('sellerid',Session::get('SellerId'))->sum('productPrice');
        $totalCommision = Orderdetails::where('sellerid',Session::get('SellerId'))->sum('sellerCommision'); 
        $totalOrder = Orderdetails::where('sellerid',Session::get('SellerId'))->count();
        return view('frontEnd.layouts.pages.seller.dashboard',compact('totalProduct','totalSell','totalCommision','totalOrder'));
      }else{
        return redirect('login/seller')->with('warning','Opps! Please login first');
      }
    }
    public function sellereditprofile(){
      if($this->validSeller()){
       $SellerId = Session::get('SellerId');
       $editprofile = Seller::where('id',$SellerId)->first();
        return view('frontEnd.layouts.pages.seller.editprofile',compact('editprofile'));
        }else{
        return redirect('login/seller')->with('warning','Opps! Please login first');
      }
    }
    public function profileupdate(Request $request){
       $this->validate($request,[
            'shopname' => 'required',
            'sellerphone' => 'required',
            'selleremail' => 'required',
        ]);
       $update_data = Seller::where('id',Session::get('SellerId'))->first();
       $update_shoplogo = $request->file('shoplogo');
              if ($update_shoplogo) {
                 $file = $request->file('shoplogo');
                  File::delete(public_path() . 'public/uploads/shoplogo', $update_data->shoplogo); 
                  $name = time().'-'.$file->getClientOriginalName();
                  $uploadPath = 'public/uploads/shoplogo/';
                  $file->move($uploadPath,$name);
                  $fileUrl =$uploadPath.$name;
              }else{
                  $fileUrl = $update_data->shoplogo;
              }

              $update_shopbanner = $request->file('shopbanner');
              if ($update_shopbanner) {
                 $file2 = $request->file('shopbanner');
                  File::delete(public_path() . 'public/uploads/shopbanner', $update_data->shopbanner); 
                  $name2 = time().'-'.$file2->getClientOriginalName();
                  $uploadPath2 = 'public/uploads/shopbanner/';
                  $file2->move($uploadPath2,$name2);
                  $fileUrl2 =$uploadPath2.$name2;
              }else{
                  $fileUrl2 = $update_data->shopbanner;
              }

        $update_data->shopname = $request->shopname;
        $update_data->slug =  strtolower(preg_replace('/\s+/u', '-', trim($request->shopname)));
        $update_data->sellerphone = $request->sellerphone;
        $update_data->sellerphone2 = $request->sellerphone2;
        $update_data->selleremail = $request->selleremail;
        $update_data->contperson = $request->contperson;
        $update_data->selleraddress = $request->selleraddress;
        $update_data->sellerwebsite = $request->sellerwebsite;
        $update_data->sellerbankaccount = $request->sellerbankaccount;
        $update_data->sellerbankname = $request->sellerbankname;
        $update_data->sellerbankbranch = $request->sellerbankbranch;
        $update_data->sellerroutingno = $request->sellerroutingno;
        $update_data->shoplogo = $fileUrl;
        $update_data->shopbanner = $fileUrl2;
        $update_data->save();
        return redirect('me/seller')->with('success','Your account update successfully');
    }

 public function passwordforget(){
        return view('frontEnd.layouts.pages.seller.passwordforget');
    }
    public function forgetcode(){
        return view('frontEnd.layouts.pages.seller.forgetcode');
    }
    public function forgeaccontcheck(Request $request){
      $this->validate($request,[
            'selleremail' => 'required',
        ]);
       $validSeller =Seller::orWhere('selleremail',$request->selleremail)
       ->first();
        if($validSeller){
          Session::put('sellerEmail',$validSeller->selleremail);
           $forgetcode = rand(111111,999999); 
            $data = array(
                'shopname' => $validSeller->shopname,
                'email' =>    $validSeller->selleremail,
                'forgetcode' => $forgetcode,
                );
            $send = Mail::send('frontEnd.emails.seller.forgetcode', $data, function($textmsg) use ($data){
              $textmsg->to($data['email']);
              $textmsg->subject('Password Forget Code');
            });

          $validSeller->forgetcode =$forgetcode;
          $validSeller->save();
         return redirect('seller/forget/password/verify')->with('success','Done! we send a forget password verify code in your mail');
        }else{
          return redirect()->back()->with('warning','Sorry! You have no account');
        }
        return view('frontEnd.layouts.pages.seller.passwordreset');
    }

    public function passwordrecovery(){
        return view('frontEnd.layouts.pages.seller.passwordrecovery');

    }
    public function forgetcodeverfy(Request $request){
      $this->validate($request,[
            'sellerEmail' => 'required',
        ]);
       $validSeller =Seller::orWhere('selleremail',$request->sellerEmail)
       ->first();
        if($validSeller->forgetcode==$request->verifycode){
           return redirect('seller/forget/password/recovery')->with('success','Success, Now create your new password');
        }else{
          return redirect()->back()->with('warning','Sorry! Your forget code is wrong');
        }
    }
    public function updateforgetpass(Request $request){
      $this->validate($request,[
            'sellerEmail' => 'required',
        ]);
       $validSeller =Seller::orWhere('selleremail',$request->sellerEmail)
       ->first();
        if($validSeller){
          $validSeller->password = bcrypt($request->snewpassword);
          $validSeller->save();
          $SellerId = $validSeller->id;
          Session::put('SellerId',$SellerId);
          Session::forget('sellerEmail');
           return redirect('me/seller')->with('success','Success, Your New Password Set Successfully');
        }else{
          return redirect()->back()->with('warning','Sorry! Somethings Wrong');
        }
    }
    public function sellerlogout(){
        Session::forget('SellerId');
        return redirect('/login/seller')->with('success','You are logout successfully');
    }

    // product change password
    public function changepassword(Request $request){
        $this->validate($request, [
            'selleroldpassword'=>'required',
            'sellernewpassword'=>'required',
        ]);

        $sellerinfo = Seller::where('id',Session::get('SellerId'))->first();
        $hashPass = $sellerinfo->password;
        if (Hash::check($request->selleroldpassword, $hashPass)) {
            $sellerinfo->fill([
                'password' => Hash::make($request->sellernewpassword)
            ])->save();
            return redirect()->back()->with('success','Done !,Your Password Change Success');
        }else{
           return redirect()->back()->with('warning','Opps!,Old Password Not Match');
        }

    }

    // brand request 
     public function brandrequest(){
      if($this->validSeller()){
        return view('frontEnd.layouts.pages.seller.brandrequest');
       }else{
        return redirect('login/seller')->with('warning','Opps! Please login first');
      }
    }

    public function sellerbrandadd(Request $request){
      $this->validate($request,[
            'brandName'=>'required',
            'requestid'=>'required',
      ]);


      $store_data                    = new Brand();
      $store_data->brandName       = $request->brandName;
      $store_data->slug            =  Str::slug($request->get('brandName'));
      $store_data->requestid       = $request->requestid;
      $store_data->status            = 0;
      $store_data->save();

        $brand_id = $store_data->id;
        $subcategories =$request->subcategory;
        foreach($subcategories as $subcategory){
            $brandarea = new Brandinsert();
            $brandarea->brand_id = $brand_id;
            $brandarea->subcat_id = $subcategory;
            $brandarea->save();
        }
    return redirect('me/seller')->with('success','Thanks, Your request send successfully');

    }


}
