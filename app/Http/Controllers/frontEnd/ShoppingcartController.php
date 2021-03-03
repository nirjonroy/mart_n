<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Area;
use App\District;
use Session;
use Cart;
class ShoppingcartController extends Controller
{
    //======= Add To Cart Product Start=========== 
    public function addToCartPost(Request $request, $id){
        $totalProduct = Cart::content()->count();
        $qty = $request->qty;
         $productInfo = DB::table('products')->where('id',$id)->first();
         $productImage = DB::table('productimages')->where('product_id',$id)->first();
         if($request->proColor && $request->proSize){
            Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'size'=>$request->proSize,'color'=>$request->proColor,'sellerid'=>$request->sellerid,'additionalshipping'=>$productInfo->additionalshipping,'productpoint'=>$productInfo->productpoint]]);
         Toastr::success('Cart added successfully', 'Added');
         }
         elseif($request->proSize && $request->proColor==0){
         Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'size'=>$request->proSize,'sellerid'=>$request->sellerid,'additionalshipping'=>$productInfo->additionalshipping,'productpoint'=>$productInfo->productpoint]]);
         Toastr::success('Cart added successfully', 'Added');
         }
         elseif($request->proColor && $request->proSize==0){
            Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'color'=>$request->proColor,'sellerid'=>$request->sellerid,'additionalshipping'=>$productInfo->additionalshipping,'productpoint'=>$productInfo->productpoint]]);
         Toastr::success('Cart added successfully', 'Added');
         }else{
            Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'sellerid'=>$request->sellerid,'additionalshipping'=>$productInfo->additionalshipping,'productpoint'=>$productInfo->productpoint]]);
             Toastr::success('Cart added successfully', 'Added');
         }
        return redirect()->back();  
    }
    
    
    public function cartContent() {
      $customerId=Session::get('customerId');
       $shippingfee =  DB::table('shippings')
        ->join('districts','shippings.district','=','districts.id')
        ->join('areas','shippings.area','=','areas.id')
        ->where('shippings.customerid',$customerId)
        ->select('shippings.*','areas.shippingfee','areas.area as areaname','districts.name as disname','districts.id as disid')
        ->first();
        $districts = District::where('status',1)->get();
        $areas = Area::where('id',$shippingfee->area)->get();
        return view('frontEnd.layouts.includes.cartcontent',compact('shippingfee','districts','areas'));
    }

    public function cartQty() {
        return view('frontEnd.layouts.includes.cartquantity');
    }
    public function showCart(){
        Session::forget('freeshipping');
        $totalProduct = Cart::instance('shopping')->content()->count();
        if($totalProduct != 0){
        $customerId=Session::get('customerId');
        if($customerId!=NULL){
    	$cartInfos = Cart::instance('shopping')->content();
        $shippingfee =  DB::table('shippings')
        ->join('districts','shippings.district','=','districts.id')
        ->join('areas','shippings.area','=','areas.id')
        ->where('shippings.customerid',$customerId)
        ->select('shippings.*','areas.shippingfee','areas.area as areaname','districts.name as disname','districts.id as disid')
        ->first();
        if($shippingfee!=NULL){
            $districts = District::where('status',1)->get();
            $areas = Area::where('id',$shippingfee->area)->get();
           return view('frontEnd.layouts.pages.showcart', compact('cartInfos','shippingfee','areas','districts'));
        }else{
            return redirect('customer/shipping-address')->with('error','Opps! , Please set your shipping address');
        }
          } else{
            return redirect('customer/login')->with('error','Opps! , Please login first');
           }
    	}else
        {
        Toastr::success('Your shopping cart empty', 'Sorry');
        return redirect('/');
         }
	}

	public function incrementCart($id,$qty){
        $cartinfo=Cart::instance('shopping')->update($id,$qty);
        return response()->json($cartinfo);
    }

    public function decrementCart($id,$qty){
        $cartinfo=Cart::instance('shopping')->update($id,$qty);
        Toastr::success('Cart update successfully','Notification');
        return response()->json($cartinfo);
    }
    public function updateCart($id,$qty){
        $cartinfo=Cart::instance('shopping')->update($id,$qty);
        Toastr::success('Cart update successfully','Notification');
        return response()->json($cartinfo);
    }
    public function cartOffer($id,$amount){
        if($id==1){
            Session::put('freeshipping',1);
            Session::put('offercartid',$id);
            Session::forget('usecouponcode');
            $cartinfo = Session::put('offeramount',$amount);
            Toastr::success('Cart update successfully','Notification');
            return response()->json($cartinfo);
        }elseif($id==2){
            Session::forget('freeshipping');
            Session::put('offercartid',$id);
            Session::forget('usecouponcode');
            $cartinfo = Session::put('offeramount',$amount);
            Toastr::success('Cart update successfully','Notification');
            return response()->json($cartinfo);
        }else{
            Session::forget('freeshipping');
            Session::put('offercartid',$id);
            Session::forget('usecouponcode');

            $subtotal =Cart::instance('shopping')->subtotal();
            $subtotal=str_replace(',', '', $subtotal);
            $subtotal=str_replace('.00', '',$subtotal);
            $offeramount =(($subtotal*$amount)/100);
            $cartinfo = Session::put('offeramount',$offeramount);
            Toastr::success('Cart update successfully','Notification');
            return response()->json($cartinfo);
        }
    }

    public function deleteCart($id) {
        $cartinfo=Cart::instance('shopping')->update($id,0);
        return response()->json($cartinfo);
    }

    public function deleteWishlist(Request $request) {
        $totalProduct = Cart::instance('wishlist')->count();
        if ($totalProduct) {
            $rowId =$request->rowId;
            Cart::instance('wishlist')->update($rowId,0);
            Toastr::success('Product remove from cart', 'Thanks');
            return redirect()->back();
        }
        else{
            return redirect('/');
        }
        
    }

     public function shippingcharge(Request $request){
        Session::put('totalshipping',$request->totalshipping);
    }
    // =========== Add To Cart Oparation End =============

    // ========wish list oparation end================

    public function addwishlist($id){
         $qty =1;
         $productInfo = DB::table('products')->where('id',$id)->first();
         $productImage = DB::table('productimages')->where('product_id',$id)->first();
         Cart::instance('wishlist')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'sellerid'=>$productInfo->sellerid,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
        return redirect()->back()->with('success','Success, Product added in wishlist');
         
    }  
    public function wishlistProduct() {
        $wishlistproducts = Cart::instance('wishlist')->content();
        if($wishlistproducts->count()){
        return view('frontEnd.layouts.pages.wishlistproduct',compact('wishlistproducts'));
        }else{
            Toastr::info('You have no product in wishlist', 'Opps!');
            return redirect('/');
        }
    }

    public function addcartTowishlist(Request $request,$id){
    $totalProduct = Cart::content()->count();
    $qty = $request->qty;
     $productInfo = DB::table('products')->where('id',$id)->first();
     $productImage = DB::table('productimages')->where('product_id',$id)->first();
     if($request->proColor && $request->proSize){
        Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'size'=>$request->proSize,'color'=>$request->proColor,'sellerid'=>$productInfo->sellerid,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
         $rowId =$request->rowId;
         Cart::instance('wishlist')->update($rowId,0);
         Toastr::success('Cart added successfully', 'Added');
     }
     elseif($request->proSize && $request->proColor==0){
     $cartinfo= Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'size'=>$request->proSize,'sellerid'=>$productInfo->sellerid,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
         $rowId =$request->rowId;
        Cart::instance('wishlist')->update($rowId,0);
     Toastr::success('Cart added successfully', 'Added');
     }
     elseif($request->proColor && $request->proSize==0){
        $cartinfo= Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'color'=>$request->proColor,'sellerid'=>$productInfo->sellerid,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
        $rowId =$request->rowId;
        Cart::instance('wishlist')->update($rowId,0);
     Toastr::success('Cart added successfully', 'Added');
     }else{
        $cartinfo= Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'sellerid'=>$productInfo->sellerid,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
        $rowId =$request->rowId;
        Cart::instance('wishlist')->update($rowId,0);
         Toastr::success('Cart added successfully', 'Added');
     }

    return redirect()->back();  
    }


    // ========compare product oparation end=============
    public function addCompare($id){
             $qty =1;
             $productInfo = DB::table('products')->where('id',$id)->first();
             $productImage = DB::table('productimages')->where('product_id',$id)->first();
             Cart::instance('compare')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'description'=>$productInfo->proDescription]]);
             Toastr::success('product add to compare', 'Thanks');
            return redirect()->back();
             
        }
    public function compareproduct() {
        $compareproduct = Cart::instance('compare')->content();
        if($compareproduct->count()){
        return view('frontEnd.layouts.pages.compareproduct',compact('compareproduct'));
        }else{
            Toastr::info('You have no product in compare', 'Opps!');
            return redirect('/');
        }
    }
    public function compareProductadd($id,$rowId){
            $totalProduct = Cart::instance('shopping')->content()->count();
            $qty =1;
             $productInfo = DB::table('products')->where('id',$id)->first();
             $productImage = DB::table('productimages')->where('product_id',$id)->first();
             Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->productname,'qty'=>$qty,'price'=>$productInfo->productnewprice,'options' => ['image'=>$productImage->image,'productpoint'=>$productInfo->productpoint,'additionalshipping'=>$productInfo->additionalshipping]]);
             Toastr::success('product add to cart', 'successfully');
             Cart::instance('compare')->update($rowId,0);
             return redirect()->back();
             
        }
    public function removeCompare(Request $request) {
        $compareproduct = Cart::instance('compare')->content();
            if ($compareproduct) {
                $rowId =$request->rowId;
                Cart::instance('compare')->update($rowId,0);
                Toastr::success('Compare product remove successfully', 'successfully');
                return redirect()->back();
            }
            else{
                return redirect('/');
            }
    }
    //=========compare produc end=============

}
