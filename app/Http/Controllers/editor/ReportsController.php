<?php

namespace App\Http\Controllers\editor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Orderdetails;
use App\Prescription;
use App\Customermessage;
use App\Comment;
use App\Customer;
use App\Shippingfee;
use App\Shipping;
use App\Order;
use App\Guestorder;
use App\Product;
use App\Seller;
use Mail;
use File;
use Auth;
use Cart;
use DB;
class ReportsController extends Controller
{
     public function ordermanage(Request $request){
        if($request->startdate && $request->enddate){
            $orderinfo = DB::table('orders')
            ->join('customers','orders.customerId','=','customers.id')
            ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
            ->orderBy('orders.orderIdPrimary','DESC')
            ->whereDate('orders.updated_at','>=',$request->startdate)
            ->whereDate('orders.updated_at','<=',$request->enddate)
            ->get();
        }else{
    	$orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }
        return view('backEnd.reports.ordermanage',compact('orderinfo'));
    }
    public function orderdetails($shippingId,$customerId,$orderIdPrimary){
	    	$customerInfo = DB::table('orders')
	        ->join('customers','orders.customerId','=','customers.id')
	        ->join('paymentsaves','orders.orderIdPrimary','=','paymentsaves.orderId')
	        ->where('customers.id',$customerId)
	        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.address','paymentsaves.paymentType')
	        ->first();

	        $paymentmethod = DB::table('paymentsaves')
	        ->join('orders','paymentsaves.orderId','=','orders.orderIdPrimary')
	        ->where('paymentsaves.orderId',$orderIdPrimary)
	        ->select('paymentsaves.*','orders.orderIdPrimary')
	        ->first();

          $orderInfo =Order::where('orderIdPrimary',$orderIdPrimary)
          ->first();

	        $shippingInfo = DB::table('ordershippings')
	        ->join('orders','ordershippings.id','=','orders.shippingId')
            ->join('districts','ordershippings.district','=','districts.id')
            ->join('areas','ordershippings.area','=','areas.id')
	        ->where('ordershippings.id',$shippingId)
	        ->select('ordershippings.*','orders.*','areas.area','districts.name')
	        ->first();

	        $orderDetails = DB::table('orderdetails')
	        ->join('products','orderdetails.ProductId','=','products.id')
	        ->where('orderdetails.orderId',$orderIdPrimary)
	        ->select('orderdetails.*')
	        ->get();
          return view('backEnd.reports.invoice',compact('orderInfo','shippingInfo','customerInfo','orderDetails','paymentmethod'));
	    }

     public function orderConfirm($cid,$orderIdPrimary){
          $orders = Order::where('orderIdPrimary',$orderIdPrimary)->update(['orderStatus' => 2]);
          $customerInfo = Customer::where('id',$cid)->first();
          $data = array(
            'fullName' => $customerInfo->fullName,
            'email' => $customerInfo->email,
            'orderid' => $orderIdPrimary,
            'orderdate' => date('m d, Y'),
            'subject' =>'Order Confirmation'
            );
            $send = Mail::send('backEnd.emails.customer.orderconfirm', $data, function($textmsg) use ($data){
              $textmsg->to($data['email']);
              $textmsg->subject('Your order has been Received – Mart9294');
         });
        Toastr::success('message', 'Order confirmed successfully!');
        return redirect()->back();
    }

     public function orderPaid($cid,$orderIdPrimary){
        $published_data = Order::where('orderIdPrimary',$orderIdPrimary)->update(['orderStatus' => 1]);
         $orderInfo = Order::where('orderIdPrimary',$orderIdPrimary)->first();
         // dd($orderInfo);
         $customerInfo = Customer::where('id',$cid)->first();
         
         // point added when available point in product
          if($orderInfo->totalproductpoint!=0){
            $currentmypoint= $customerInfo->mypoint + $orderInfo->totalproductpoint;
            $customerInfo->mypoint = $currentmypoint;
            $customerInfo->save();
          }

         // minus when use point from customer point
         if($orderInfo->usemypoint==1){
            $usepoint = (1*$orderInfo->orderTotal/100);
            if($customerInfo->mypoint >= $usepoint){
                $currentmypoint= $customerInfo->mypoint - $usepoint;
                $customerInfo->mypoint = $currentmypoint;
                $customerInfo->save();
            }
         }
         return "hi";
          $data = array(
            'fullName' => $customerInfo->fullName,
            'email' => $customerInfo->email,
            'orderid' => $orderIdPrimary,
            'subject' =>'Order Confirmation'
            );
            $send = Mail::send('backEnd.emails.customer.orderdelivery', $data, function($textmsg) use ($data){
              $textmsg->to($data['email']);
              $textmsg->subject('Your order has been Received –Mart9294');
         });
            return redirect()->back();
        $orderproducts = Orderdetails::where('orderId',$orderIdPrimary)->get();
        foreach($orderproducts as $orderproduct){
          $findsellers = Seller::where('id',$orderproduct->sellerid)->get();
          foreach($findsellers as $findseller){
            $perviousamount = $findseller->sellertotalamount;
            $orderamount = ($orderproduct->productPrice*$orderproduct->productQuantity);
            $findseller->sellertotalamount =$perviousamount+$orderamount;
            $findseller->save();
          }

        }
        Toastr::success('message', 'payment paid successfully!');
        return redirect()->back();
    }
    public function cancelledreport(Request $request){
        if($request->startdate && $request->enddate){
            $orderinfo = DB::table('orders')
            ->join('customers','orders.customerId','=','customers.id')
            ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
            ->whereDate('orders.updated_at','>=',$request->startdate)
            ->whereDate('orders.updated_at','<=',$request->enddate)
            ->where('orders.orderStatus',3)
            ->orderBy('orders.orderIdPrimary','DESC')
            ->get();
        }else{
        $orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->where('orders.orderStatus',3)
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }
        return view('backEnd.reports.cancelledreport',compact('orderinfo'));
    }
    public function deliveryreport(Request $request){
        if($request->startdate && $request->enddate){
        $orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->whereDate('orders.updated_at','>=',$request->startdate)
        ->whereDate('orders.updated_at','<=',$request->enddate)
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->where('orders.orderStatus',1)
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }else{
        $orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->where('orders.orderStatus',1)
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }
        return view('backEnd.reports.deliveryreport',compact('orderinfo'));
    }

     public function orderCancelled($cid,$orderIdPrimary){
        $published_data = Order::where('orderIdPrimary',$orderIdPrimary)->update(['orderStatus' => 3]);
         $customerInfo = Customer::where('id',$cid)->first();
          $data = array(
            'fullName' => $customerInfo->fullName,
            'email' => $customerInfo->email,
            'orderid' => $orderIdPrimary,
            'subject' =>'Order Confirmation'
            );
            $send = Mail::send('backEnd.emails.customer.ordercancelled', $data, function($textmsg) use ($data){
              $textmsg->to($data['email']);
              $textmsg->subject('Your order has been Received –Mart9294');
         });
            return redirect()->back();
        $orderproducts = Orderdetails::where('orderId',$orderIdPrimary)->get();
        foreach($orderproducts as $orderproduct){
          $findsellers = Seller::where('id',$orderproduct->sellerid)->get();
          foreach($findsellers as $findseller){
            $perviousamount = $findseller->sellertotalamount;
            $orderamount = ($orderproduct->productPrice*$orderproduct->productQuantity);
            $findseller->sellertotalamount =$perviousamount+$orderamount;
            $findseller->save();
          }

        }
        Toastr::success('message', 'payment Cancelled successfully!');
        return redirect()->back();
    }

     public function sellerinactive(Request $request){
        $seller_inactive           =   Seller::find($request->hidden_id);
        $seller_inactive->status   =   0;
        $seller_inactive->save();
        Toastr::success('message', 'Seller inactive successfully!');
        return redirect('editor/all/seller');   
    }
    public function selleractive(Request $request){
        $seller_active         =   Seller::find($request->hidden_id);
        $seller_active->status =   1;
        $seller_active->save();
        Toastr::success('message', 'Seller active successfully!');
        return redirect('editor/all/seller');   
    }
    public function seller(){
      $sellers = Seller::get();
      return view('backEnd.reports.seller',compact('sellers'));
    }

    public function sellerview($id){
        $sellerinfo  = Seller::where(['id'=>$id])->first();

        $allproducts = Product::where('sellerid',$id)->get();

        $allorders   = DB::table('orderdetails')
        ->join('products','orderdetails.ProductId','=','products.id')
        ->where('products.sellerid',$id)
        ->get();
        return view('backEnd.reports.sellerview',compact('sellerinfo','allproducts','allorders'));
    } 
     public function sellerproduct($id){
        $products   = DB::table('products')
        ->where('products.sellerid',$id)
        ->get();
        return view('backEnd.reports.sellerproduct',compact('products'));
    }
    public function bulkseller(Request $request){
        $selleroption = $request->selleroptions;
        if($selleroption==0){
           $sellers = $request->sellers;
            foreach($sellers as $seller){
                $seller         =   Seller::find($seller);
                $seller->status =   0;
                $seller->save();
            } 
            Toastr::success('message', 'Seller inactive successfully!');
            return redirect('editor/all/seller');
        }elseif($selleroption==1){
           $sellers = $request->banners;
            foreach($sellers as $seller){
                $seller         =   Seller::find($seller);
                $seller->status =   1;
                $seller->save();
                
            } 
            Toastr::success('message', 'Seller active successfully!');
            return redirect('editor/all/seller');
        } 
    }
    public function productbulkoption(Request $request){
        $selectption = $request->selectptions;
        if($selectption==0){
            $products_id = $request->products_id;
            foreach($products_id as $product_id){
                $product_inactive         =   Product::find($product_id);
                $product_inactive->status =   0;
                $product_inactive->save();
            } 
            Toastr::success('message', 'Products inactive successfully!');
            return redirect()->back();
        }elseif($selectption==1){
           $products_id = $request->products_id;
                foreach($products_id as $product_id){
                    $product_active         =   Product::find($product_id);
                    $product_active->status =   1;
                    $product_active->save();
                } 
                Toastr::success('message', 'Products active successfully!');
                return redirect()->back();
            }elseif($selectption==2){
                $products_id = $request->products_id;
                foreach($products_id as $product_id){
                    $productInfo = Product::where('id',$product_id)->first();
                    Cart::instance('bulkproducts')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>'1','price'=>'100']);
                }
            return view('backEnd.productmanage.productbulkedit');
        } 
    }
    
   public function completestockreport(Request $request){
       if($request->startdate && $request->enddate){
        $complatestockreport= DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->whereDate('products.updated_at','>=',$request->startdate)
        ->whereDate('products.updated_at','<=',$request->enddate)
        ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
        ->get();
       }else{
        $complatestockreport= DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
        ->get();
       }
        return view('backEnd.reports.completestockreport',compact('complatestockreport'));
    }
    public function lowstockreport(Request $request){
         if($request->startdate && $request->enddate){
            $lowstockreport= DB::table('products')
            ->join('categories','products.productcat','=','categories.id')
            ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->join('sellers','products.sellerid','=','sellers.id')
            ->where('products.productquantity','<','5')
            ->whereDate('products.updated_at','>=',$request->startdate)
            ->whereDate('products.updated_at','<=',$request->enddate)
            ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
            ->get();
         }else{
            $lowstockreport= DB::table('products')
            ->join('categories','products.productcat','=','categories.id')
            ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->join('sellers','products.sellerid','=','sellers.id')
            ->where('products.productquantity','<','5')
            ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
           ->get();
         }
        return view('backEnd.reports.lowstockreport',compact('lowstockreport'));
    }
    public function outstockreport(Request $request){
        if($request->startdate && $request->enddate){
            $outstockreport= DB::table('products')
            ->join('categories','products.productcat','=','categories.id')
            ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->join('sellers','products.sellerid','=','sellers.id')
            ->where('products.productquantity','<','1')
            ->whereDate('products.updated_at','>=',$request->startdate)
            ->whereDate('products.updated_at','<=',$request->enddate)
            ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
            ->get();
         }else{
            $outstockreport= DB::table('products')
            ->join('categories','products.productcat','=','categories.id')
            ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->join('sellers','products.sellerid','=','sellers.id')
            ->where('products.productquantity','1','5')
            ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
           ->get();
         }
        return view('backEnd.reports.outstockreport',compact('outstockreport'));
    }
    
    public function salesreport(Request $request){
        if($request->startdate && $request->enddate){
        $orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->where('orders.orderStatus',1)
        ->whereDate('orders.updated_at','>=',$request->startdate)
        ->whereDate('orders.updated_at','<=',$request->enddate)
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }else{
        $orderinfo = DB::table('orders')
        ->join('customers','orders.customerId','=','customers.id')
        ->select('orders.*','customers.fullName','customers.phoneNumber','customers.id as cid')
        ->where('orders.orderStatus',1)
        ->orderBy('orders.orderIdPrimary','DESC')
        ->get();
        }
        return view('backEnd.reports.salesreport',compact('orderinfo'));
    }
    
    
    
    public function sellerdelete($id)
    {
        $delete_data = Seller::find($id);
        $delete_data->delete();
        Toastr::success('message', 'Seller  delete successfully!');
        return redirect()->back();
        
    }
    
    
    
    
}
