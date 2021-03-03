<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Customer;
use App\Shipping;
use App\Paymentsave;
use App\Order;
use App\Orderdetails;
use App\Comment;
use App\Review;
use Cart;
use Session;
use App\Post;
use App\Guestorder;
use App\Guestorderdetails;
use App\Shippingfee;
use App\District;
use App\Area;
use App\Couponcode;
use App\Ordershipping;
use App\Seller;
use Mail;
use DB;
use File;
use Auth;
class CustomerController extends Controller
{
    private function validCustomer(){
        $checkCustomer= Session::get('customerId');
        $customerInfo=Customer::find($checkCustomer);
        return $customerInfo;
    }
    
    public function registerPage(){
      return view('frontEnd.layouts.pages.customer.register');
    }
    
    public function customerRegister(Request $request){
       $this->validate($request,[
            'fullName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
       $customerEmail=Customer::where('email',$request->email)->first();
       $customerPhone=Customer::where('phoneNumber',$request->phoneNumber)->first();
       if($customerEmail && $customerPhone){
         return redirect()->back()->with('warning','Opps! This email & phone number already used');
           $this->validate($request,[
                'email'=>'required|unique:customers',
                'phoneNumber'=>'required|unique:customers',
            ]);
         return redirect()->back();
       
       }elseif($customerEmail){
           return redirect()->back()->with('warning','Opps! This email already used');
           $this->validate($request,[
                'email'=>'required|unique:customers',
            ]);
         return redirect()->back();
       }elseif($customerPhone){
          return redirect()->back()->with('warning','Opps! Your phone already exist');
         $this->validate($request,[
                'phoneNumber'=>'required|unique:customers',
            ]);
         return redirect()->back();
       }else{
           $verifyToken=rand(111111,999999);
           $store_data        =   new Customer();
           $store_data->fullName    =   $request->fullName;
           $store_data->phoneNumber   = $request->phoneNumber;
           $store_data->email       = $request->email;
           $store_data->verifyToken   = $verifyToken;
           $store_data->password      = bcrypt(request('password'));
           $store_data->save();
          
          // verify code send to customer mail
           $data = array(
             'fullName' => $store_data->fullName,
             'customerid' => $store_data->id,
             'email' => $store_data->email,
             'password' => $request->password,
             'verifyToken' => $verifyToken,
            );
            $send = Mail::send('frontEnd.emails.customer.register', $data, function($textmsg) use ($data){
              $textmsg->to($data['email']);
              $textmsg->subject('Account Verified');
            });
          return redirect('/')->with('success','Account create successfully.Check your email.');
       }
    }
   
     public function customerVerify($customerid,$verifyToken){
        $verified=Customer::where(['id'=>$customerid,'verifyToken'=>$verifyToken])->first();
        if($verified!=NULL){
        $verifydbtoken = $verified->verifyToken;
       if($verifydbtoken == $verifyToken){
            $verified->verifyToken = 1;
            $verified->status = 1;
            $verified->save();
            Session::forget('SellerId');
            return redirect('customer/login')->with('success','Thanks! your account verified');
       }else{
            return redirect()->back()->with('error','Opps! your verify token wrong');
        }
        }else{
         return redirect('/')->with('error','Opps! Your are process wrong'); 
        }
    }
    public function customerLoginPage(){
      return view('frontEnd.layouts.pages.customer.login');
    }
    public function customerLogin(Request $request){
       $customerCheck =Customer::orWhere('email',$request->phoneOremail)
       ->orWhere('phoneNumber',$request->phoneOremail)
       ->first();
        if($customerCheck){
          if($customerCheck->status == 0){
             return redirect()->back()->with('error', 'Opps! your account has been suspends');
         }else{
          if(password_verify($request->password,$customerCheck->password)){
            if(Cart::instance('shopping')->count()!=0){
                    $customerId = $customerCheck->id;
                    Session::put('customerId',$customerId);
               return redirect('/show-cart')->with('success','Your area login successfully');
            }else{
              $customerId = $customerCheck->id;
                   Session::put('customerId',$customerId);
                    Session::forget('SellerId');
              return redirect('/customer/my-account')->with('success','Your area login successfully');
            }
          }else{
              return redirect()->back()->with('error','Opps! your password wrong');
          }

           }
        }else{
          return redirect()->back()->with('warning','Sorry! You have no account');
        }
    }
    public function customerRlogin(Request $request){
       $customerCheck =Customer::orWhere('email',$request->phoneOremail)
       ->orWhere('phoneNumber',$request->phoneOremail)
       ->first();
        if($customerCheck){
          if($customerCheck->status == 0){
             return redirect()->back()->with('error', 'Opps! your account has been suspends');
         }else{
          if(password_verify($request->password,$customerCheck->password)){
            if(Cart::instance('shopping')->count()!=0){
                    $customerId = $customerCheck->id;
                    Session::put('customerId',$customerId);
               return redirect('/show-cart')->with('success','Your area login successfully');
            }else{
              $customerId = $customerCheck->id;
                   Session::put('customerId',$customerId);
                   Session::forget('SellerId');
              return redirect()->back()->with('success','Your area login successfully');
            }
          }else{
              return redirect()->back()->with('error','Opps! your password wrong');
          }

           }
        }else{
          return redirect()->back()->with('warning','Sorry! You have no account');
        }
    }

    public function resendcode($id){
        $findcustomer=Customer::find($id);
        $verifyToken=rand(111111,999999);
        $findcustomer->verifyToken=$verifyToken;
        $findcustomer->save();

        // verify code send to customer mail
        $data=$findcustomer->toArray();
        $send = Mail::send('frontEnd.emails.customer.register', $data, function($textmsg) use ($data){
          $textmsg->to($data['email']);
          $textmsg->subject('account veriry code');
        });
      return redirect('customer/verify')->with('success','Success! We resend your verify code in mail');
    }
    public function profileEdit(){
       $customerId = Session::get('customerId');
       $customerInfo = Customer::where('id',$customerId)->first();
        if($customerId==!Null){
           return view('frontEnd.layouts.pages.customer.editprofile',compact('customerInfo'));
        }else{
           return redirect('customer/login');
        }
    }
    public function customerProfile(){
       $customerInfo = Customer::where('id',Session::get('customerId'))->first();
        if($customerInfo==!Null){
           return view('frontEnd.layouts.pages.customer.profile',compact('customerInfo'));
        }else{
           return redirect('customer/login');
        }
    }
    public function profileUpdate(Request $request){
        $profileupdate=Customer::where('id',Session::get('customerId'))->first();        
        $file = $request->file('image');
        if ($file!=NULL) {
           $file = $request->file('image');
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/image/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $profileupdate->image;
        }
        $profileupdate->fullName=$request->fullName;
        $profileupdate->phoneNumber=$request->phoneNumber;
        $profileupdate->image=$fileUrl;
        $profileupdate->address=$request->address;
        $profileupdate->save();
        return redirect('customer/my-account')->with('success','Your information update successfully');

    }
    public function district(Request $request){
      $area = DB::table("areas")
                  ->where("district_id",$request->districtid)
                  ->pluck('area','id');
      return response()->json($area);
     }
    public function shippingfee(Request $request){
      $cartinfo = DB::table("areas")
                  ->where("id",$request->areaid)
                   ->first();
      $shippingfee = $cartinfo->shippingfee;
      $cshippingfee = Session::put('cshippingfee',$shippingfee);
      return response()->json($cartinfo);
     }

    public function shippingajaxcontent() {
        $districts = District::where('status',1)->get();
        return view('frontEnd.layouts.includes.shippingcontent',compact('districts'));
    }
    
    public function paymentForm(){
        $cartproduct= Cart::instance('shopping')->content()->count();
        if($cartproduct!=NULL){
        if(Session::get('customerId')!=NULL){
          $customerId=Session::get('customerId');
           $shippingfee =  DB::table('shippings')
            ->join('districts','shippings.district','=','districts.id')
            ->join('areas','shippings.area','=','areas.id')
            ->where('shippings.customerid',$customerId)
            ->select('shippings.*','areas.shippingfee','areas.area as areaname','districts.name as disname')
            ->first();
            $districts = District::where('status',1)->get();
            $areas = Area::where('id',$shippingfee->area)->get();
             return view('frontEnd.layouts.pages.payment',compact('shippingfee','districts','areas'));
         }else{
             return redirect('/customer/login')->with('error','Opps! Please login first');
         } 
       }else{
          return redirect('/')->with('error','Opps! you have not product in cart');
       }
    }

    public function payment(Request $request){
        $this->validate($request,[
            'paymentType'=>'required',
        ]);
        $cartsubtotal = Cart::instance('shopping')->subtotal();
        $cartsubtotal = str_replace('.00','',$cartsubtotal);
        $cartsubtotal = str_replace(',','',$cartsubtotal);
        $cdiscount   = Session::get('offeramount');
        $offertype   = Session::get('usecouponcode');
        $shippingfees= Session::get('cshipping');
        $additionalshippingfee= Session::get('additionalshippingfee');
        $totalproductpoint= Session::get('totalproductpoint');
        $usemypoint= Session::get('usemypoint');
        $customerId = Session::get('customerId');
        $totalOrderprice = ($cartsubtotal-$cdiscount)+$shippingfees+$additionalshippingfee;
        $paymentType=$request->paymentType;

        if($paymentType=="cash"){
           $cartProducts = Cart::instance('shopping')->content();
           $shippingInfo = Shipping::where('customerid',$customerId)->first();
           $ordershipping = new Ordershipping();
           $ordershipping->name          =   $shippingInfo->name;
           $ordershipping->phone         =   $shippingInfo->phone;
           $ordershipping->district      =   $shippingInfo->district;
           $ordershipping->area          =   $shippingInfo->area;
           $ordershipping->stateaddress  =   $shippingInfo->stateaddress;
           $ordershipping->houseaddress  =   $shippingInfo->houseaddress;
           $ordershipping->fulladdress  =    $shippingInfo->fulladdress;
           $ordershipping->customerid  =     $shippingInfo->customerid;
           $ordershipping->zipcode       =   $shippingInfo->zipcode;
           $ordershipping->save();

            $shippingid = $ordershipping->id;
            $order = new Order();
            $str=mt_rand(1000000,9999999); 
            $ordertrak = md5($str);
            $order->customerId = $customerId;
            $order->ordertrack = $ordertrak;
            $order->cshippingfee = $shippingfees;
            $order->shippingId = $shippingid;
            $order->cdiscount = $cdiscount;
            $order->additionalshipping = $additionalshippingfee;
            $order->orderTotal = $totalOrderprice;
            $order->offertype = $offertype;
            $order->totalproductpoint = $totalproductpoint;
            $order->usemypoint = $usemypoint;
            $order->orderSubtotal = $cartsubtotal;
            $order->created_at = Carbon::now();
            $order->save();


            $payment = new Paymentsave();
            $payment->orderId = $order->id;
            $payment->paymentType = $paymentType;
            $payment->created_at = Carbon::now();
            $payment-> save();

          $cartProducts = Cart::instance('shopping')->content();
            foreach($cartProducts as $cartProduct){
               $sellerId = $cartProduct->options->sellerid;
               $sellerInfo = Seller::find($sellerId);
               if($sellerInfo->commisiontype==1){
                 $sellerCommision = (($sellerInfo->commision*$cartProduct->price)/100);
               }elseif($sellerInfo->commisiontype==2){
                $sellerCommision = $sellerInfo->commision;
               }else{
                $sellerCommision = 0;
               }
                $orderDetails = new Orderdetails();
                $orderDetails->orderId=$order->id;
                $orderDetails->ProductId=$cartProduct->id;
                $orderDetails->productName=$cartProduct->name;
                $orderDetails->productPrice=$cartProduct->price;
                $orderDetails->sellerCommision=$sellerCommision;
                $orderDetails->sellerid=$sellerId;
                $orderDetails->productSize=$cartProduct->options->size ? $cartProduct->options->size:'';
                $orderDetails->productColor=$cartProduct->options->color ? $cartProduct->options->color:'';
                $orderDetails->productQuantity=$cartProduct->qty;
                $orderDetails->created_at = Carbon::now();
                $orderDetails->save();

            }
            $customerInfo = Customer::find($customerId);
            $data=$customerInfo->toArray();
              $send = Mail::send('frontEnd.emails.customer.order', $data, function($textmsg) use ($data){
                $textmsg->to($data['email']);
                $textmsg->subject('Your order has been Received – Mart9294');
           });
          Session::forget('cdiscount');
          Session::forget('cshipping');
          Session::forget('offercartid');
          Cart::instance('shopping')->destroy();
          return redirect('/customer/my-account')->with('success','Thanks your order send successfully');
        }elseif($paymentType=="bkash"){
          $this->validate($request,[
            'cbkashNumber'=>'required',
            'cbkashtrxId'=>'required',
        ]);
        $cartProducts = Cart::instance('shopping')->content();
        $shippingInfo = Shipping::where('customerid',$customerId)->first();
         $ordershipping = new Ordershipping();
         $ordershipping->name          =   $shippingInfo->name;
         $ordershipping->phone         =   $shippingInfo->phone;
         $ordershipping->district      =   $shippingInfo->district;
         $ordershipping->area          =   $shippingInfo->area;
         $ordershipping->stateaddress  =   $shippingInfo->stateaddress;
         $ordershipping->houseaddress  =   $shippingInfo->houseaddress;
         $ordershipping->fulladdress  =    $shippingInfo->fulladdress;
         $ordershipping->customerid  =     $shippingInfo->customerid;
         $ordershipping->zipcode       =   $shippingInfo->zipcode;
         $ordershipping->save();

          $shippingid = $ordershipping->id;
          $order = new Order();
          $str=mt_rand(1000000,9999999); 
          $ordertrak = md5($str);
          $order->customerId = $customerId;
          $order->ordertrack = $ordertrak;
          $order->cshippingfee = $shippingfees;
          $order->shippingId = $shippingid;
          $order->cdiscount = $cdiscount;
          $order->additionalshipping = $additionalshippingfee;
          $order->totalproductpoint = $totalproductpoint;
          $order->usemypoint = $usemypoint;
          $order->orderTotal = $totalOrderprice;
          $order->orderSubtotal = $cartsubtotal;
          $order->offertype = $offertype;
          $order->created_at = Carbon::now();
          $order->save();


          $payment = new Paymentsave();
          $payment->orderId = $order->id;
          $payment->paymentType = $paymentType;
          $payment->cPaynumber = $request->cbkashNumber;
          $payment->cPaytrxid = $request->cbkashtrxId;
          $payment->created_at = Carbon::now();
          $payment-> save();

        $cartProducts = Cart::instance('shopping')->content();
          foreach($cartProducts as $cartProduct){
               $sellerId = $cartProduct->options->sellerid;
               $sellerInfo = Seller::find($sellerId);
               if($sellerInfo->commisiontype==1){
                 $sellerCommision = (($sellerInfo->commision*$cartProduct->price)/100);
               }elseif($sellerInfo->commisiontype==2){
                $sellerCommision = $sellerInfo->commision;
               }else{
                $sellerCommision = 0;
               }
                $orderDetails = new Orderdetails();
                $orderDetails->orderId=$order->id;
                $orderDetails->ProductId=$cartProduct->id;
                $orderDetails->productName=$cartProduct->name;
                $orderDetails->productPrice=$cartProduct->price;
                $orderDetails->sellerCommision=$sellerCommision;
                $orderDetails->sellerid=$sellerId;
                $orderDetails->productSize=$cartProduct->options->size ? $cartProduct->options->size:'';
                $orderDetails->productColor=$cartProduct->options->color ? $cartProduct->options->color:'';
                $orderDetails->productQuantity=$cartProduct->qty;
                $orderDetails->created_at = Carbon::now();
                $orderDetails->save();

            }
           $customerInfo = Customer::find($customerId);
            $data=$customerInfo->toArray();
              $send = Mail::send('frontEnd.emails.customer.order', $data, function($textmsg) use ($data){
                $textmsg->to($data['email']);
                $textmsg->subject('Your order has been Received – Mart9294');
           });
        Session::forget('cdiscount');
        Session::forget('cshipping');
        Session::forget('offercartid');
        Cart::instance('shopping')->destroy();
        return redirect('/customer/my-account')->with('success','Thanks your order send successfully');
       }
    }

    public function customerAccount(){
      $customerId=Session::get('customerId');
      $customerInfo=Customer::where('id',$customerId)->first();
      if($customerId!=NULL){
          if($customerInfo->verifyToken==1){
          $myorder= Order::where('customerId',$customerId)->get();
          return view('frontEnd.layouts.pages.customer.myaccount',compact('myorder'));
        }else{
          Toastr::error('Sorry, Your account is not verified.','Opps!!');
          return redirect('customer/verify');
        }
        
        }
        else{
             return redirect('/customer/login');
        }
    }
    public function cordertrackSearch(Request $request){
      $this->validate($request,[
            'orderid'=>'required',
            'customerid'=>'required',
        ]);
      $trackorder=Order::where(['ordertrack'=>$request->orderid,'customerId'=>$request->customerid])->first();
      if($trackorder){
      return view('frontEnd.layouts.pages.customer.trackorderfind',compact('trackorder'));
      }else{
          return redirect()->back()->with('error','Sorry we not found any item');
      }
    }

    public function customerOrder(){
      return view('frontEnd.layouts.pages.customer.order');
    }
    public function shippingAddress(){
      $customerId=Session::get('customerId');
      if($customerId!=NULL){
        $districts = District::where('status',1)->get();
        $shippinginfo = Shipping::where('customerid',$customerId)->first();
        if($shippinginfo==NULL){
          return view('frontEnd.layouts.pages.customer.shippingaddress',compact('districts'));
        }else{

         $areaid = Shipping::where('customerid',$customerId)->first()->area;
         $areas = Area::where('id',$areaid)->get();
          return view('frontEnd.layouts.pages.customer.editshippingaddress',compact('districts','shippinginfo','areas'));
        }
      }else{
        return redirect('customer/login');
      }
    }

    public function shippingInfo(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'district'=>'required',
            'area'=>'required',
            'houseaddress'=>'required',
            'zipcode'=>'required',
        ]);

       $shipping                =   new Shipping();
       $shipping->name          =   $request->name;
       $shipping->phone         =   $request->phone;
       $shipping->district      =   $request->district;
       $shipping->area          =   $request->area;
       $shipping->stateaddress  =   $request->stateaddress;
       $shipping->houseaddress  =   $request->houseaddress;
       $shipping->fulladdress  =   $request->fulladdress;
       $shipping->customerid  =    Session::get('customerId');
       $shipping->zipcode       =   $request->zipcode;
       $shipping->save();
        $totalProduct = Cart::instance('shopping')->content()->count();
        if($totalProduct != 0){
          return redirect('show-cart');
        }else{
          return redirect('customer/my-account')->with('success','Your shipping address save successfull');
        }
       
    }
    public function shippingInfoUpdate(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'district'=>'required',
            'area'=>'required',
            'houseaddress'=>'required',
            'zipcode'=>'required',
        ]);
       $shippingupdate                =   Shipping::find($request->hidden_id);
       $shippingupdate->name          =   $request->name;
       $shippingupdate->phone         =   $request->phone;
       $shippingupdate->district      =   $request->district;
       $shippingupdate->area          =   $request->area;
       $shippingupdate->stateaddress  =   $request->stateaddress;
       $shippingupdate->houseaddress  =   $request->houseaddress;
       $shippingupdate->fulladdress  =    $request->fulladdress;
       $shippingupdate->customerid   =    Session::get('customerId');
       $shippingupdate->zipcode       =   $request->zipcode;
       $shippingupdate->save();
       return redirect()->back()->with('success','Your shipping update address save successfull');
    }

    public function applyCoupon(Request $request){
      $findcoupon = Couponcode::where('couponcode',$request->couponcode)->first();
      if($findcoupon==NULL){
        return redirect()->back()->with('error','Opps! your entre coupon code not valid');
      }else{
        $currentdata = date('Y-m-d');
        $expairdate=$findcoupon->expairdate;
        if($currentdata <= $expairdate){
        $totalcart = Cart::instance('shopping')->subtotal();
        $totalcart = str_replace('.00','',$totalcart);
        $totalcart = str_replace(',','',$totalcart);
         if($totalcart >= $findcoupon->buyammount){
          if($findcoupon->offertype ==1){
            $discountammount =  (($totalcart*$findcoupon->amount)/100);
            Session::forget('offeramount');
            Session::put('offeramount',$discountammount);
            Session::put('usecouponcode',$findcoupon->couponcode);
          }else{
            Session::put('offeramount',$findcoupon->amount);
            Session::put('usecouponcode',$findcoupon->couponcode);
          }
          
         return redirect()->back()->with('success','Wow! your coupon accepted');
       }else{
          return redirect()->back()->with('error','Opps! Sorry your total shopping not available for offer');
       }
        }else{
          return redirect()->back()->with('error','Opps! Sorry your coupon code date expaire');
        }
      }
    }

    public function corderInvoice($orderIdPrimary){
     if($this->validCustomer()){
      $orderInfo=Order::where('orderIdPrimary',$orderIdPrimary)->first();
      $customerInfo = Customer::where('id',$orderInfo->customerId)->first();
      $paymentmethod = Paymentsave::where('paymentIdPrimary',$orderInfo->orderIdPrimary)->first();
      $shippingInfo=Ordershipping::where('id',$orderInfo->shippingId)->first();
      $orderDetails=Orderdetails::where('orderId',$orderInfo->orderIdPrimary)->get();
      return view('frontEnd.layouts.pages.customer.orderinvoice',compact('orderInfo','customerInfo','paymentmethod','shippingInfo','orderDetails'));
     }else{
        return redirect()->back()->with('error','Opps! Please login first');
      }
    }
    public function customerOrdertrack(){
      return view('frontEnd.layouts.pages.customer.ordertrack');
    }
    public function customerReview(Request $request){
      $this->validate($request,[
          'review'=>'required',
          'ratting'=>'required',
          'review'=>'required',
          ]);
      if($this->validCustomer()){
          $notexistreview = Review::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
            if($notexistreview){
              return redirect()->back()->with('error','Opps! You already given review this product');
            }else{
              $question = new Review();
              $question->product_id=$request->product_id;
              $question->ratting=$request->ratting;
              $question->review=$request->review;
              $question->customer_id=$request->customer_id;
              $question->created_at = Carbon::now();
              $question->save();
              return redirect()->back()->with('success','Thanks! we accepted your review');
            }
      }else{
        return redirect()->back()->with('error','Opps! Please login first');
      }
    }

    public function customerLogout(){
        Session::flush();
        Toastr::success('You are logout successfully', 'success!');
        return redirect('/');
    }
    public function forgetpassword(){
        return view('frontEnd.layouts.pages.customer.forgetpassword');
    }
    public function forgetpassemailcheck(Request $request){
        $this->validate($request,[
            'email'=>'required',
        ]);
       $checkEmail = Customer::where('email',$request->email)->first();
      if($checkEmail){
        $passResetToken=rand(111111,999999);
        $checkEmail->passResetToken=$passResetToken;
        $checkEmail->save();

        // verify code send to customer mail
        $data = array(
         'contact_email' => $request->email,
         'passResetToken' => $passResetToken,
        );
        $send = Mail::send('frontEnd.emails.customer.forgetpassword', $data, function($textmsg) use ($data){
         $textmsg->from('customer@mart9294.com');
         $textmsg->to($data['contact_email']);
         $textmsg->subject('Forget password code');
        });
        
        Session::put('tempCustomerId',$checkEmail->id);
        return redirect('customer/forget-password/reset')->with('success','Your are send a forget password verify code in your email');
      }else{
        return redirect()->back()->with('error','Your email is not valid');
      }
    }
    public function passresetpage(){
           if(Session::get('tempCustomerId')){
            return view('frontEnd.layouts.pages.customer.passwordreset');
        }else{
           return redirect('customer/forget-password')->with('error','Your process is invalid');
        }
    }
    public function fpassreset(Request $request){
        $this->validate($request,[
            'verifycode'=>'required',
            'newpassword'=>'required',
        ]);
       $memberInfo = Customer::find(Session::get('tempCustomerId'));
      if($memberInfo->passResetToken == $request->verifycode){
        $memberInfo->password=bcrypt(request('newpassword'));
        $memberInfo->passResetToken=NULL;
        $memberInfo->save();
        Session::forget('tempCustomerId');
        Session::put('customerId',$memberInfo->id);
        return redirect('/customer/my-account')->with('sucess','Your password reset successfully');
      }else{
        return redirect()->back()->with('error','Your verify token not match');
      }
    }

}
