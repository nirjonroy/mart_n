<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Subcategory;
use App\Childcategory;
use App\Product;
use App\Productimage;
use App\Size;
use App\Color;
use App\Productcolor;
use App\Productsize;
use App\Seller;
use App\Tag;
use App\Producttag;
use DB;
use Image;
use File;
use Cart;
use Auth;
use Session;
class ProductManageController extends Controller
{
    public function newproductrequest(){
    	$newproductrequest= DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->where('products.status',0)
        ->where('products.request',0)
        ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.sellerphone')
        ->get();
        return view('backEnd.productmanage.newproduct',compact('newproductrequest'));
    }
    public function viewdetailsrproduct($id){
    	$productdetails= DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->where('products.id',$id)
        ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.shoplogo','sellers.selleremail','sellers.selleraddress','sellers.sellerphone')
        ->first();
        $selectsizes = DB::table('productsizes')
          ->join('sizes','productsizes.size_id','=','sizes.id')
            ->where('productsizes.product_id',$id)
            ->orderBy('id','DESC')
            ->select('productsizes.*','sizes.sizeName')
            ->get();
         $selectcolors = DB::table('productcolors')
          ->join('colors','productcolors.color_id','=','colors.id')
            ->where('productcolors.product_id',$id)
            ->orderBy('id','DESC')
            ->select('productcolors.*','colors.colorName')
            ->get();
            $productbrand = DB::table('products')
            ->join('brands','products.productbrand','=','brands.id')
            ->where('products.id',$id)
            ->select('products.*','brands.brandName')
            ->first();
        return view('backEnd.productmanage.viewdetailsrproduct',compact('productdetails','selectsizes','selectcolors','productbrand'));
    }
    public function sellerproductedit ($id){
        $sellers = Seller::where('status',1)->get();
        $edit_data = Product::find($id);
        $productimage = DB::table('productimages')
        ->join('products','productimages.product_id','=','products.id')
        ->select('products.productname','productimages.*')
        ->orderBy('productimages.id','DESC')
        ->get();

        $categories=Category::where('status',1)->get();
        $categoryId = Product::find($id)->productcat;
        $subcategory = Subcategory::where('category_id','=',$categoryId)->get();
        $subcategoryId=Product::find($id)->productsubcat;

        $childcategory = Childcategory::where('subcategory_id','=',$subcategoryId)->get();
        $totalsizes = Size::where('status',1)->get();
        $productSize = Productsize::where('product_id',$id)->get();
        $totalcolors = Color::where('status',1)->get();
        $productColors = Productcolor::where('product_id',$id)->get();
        $totaltags = Tag::where('status',1)->get();
        $productTags = Producttag::where('product_id',$id)->get();
        return view('backEnd.productmanage.sellerproductedit',compact('sellers','edit_data','categories','subcategory','childcategory','totalsizes','productSize','totalcolors','productColors','productimage','productTags','totaltags'));	
    }
    public function updatependingproduct(){
        	$show_datas= DB::table('products')
            ->join('categories','products.productcat','=','categories.id')
            ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->join('sellers','products.sellerid','=','sellers.id')
            ->where('products.request',2)
            ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.selleremail','sellers.sellerphone')
        ->get();
		return view('backEnd.productmanage.updateproduct',compact('show_datas'));
        
    }
    public function productactive(Request $request){
        $approved_data          =   Product::find($request->hidden_id);
        $approved_data->request =   1;
        $approved_data->status  =   1;
        $approved_data->save();
        Toastr::success('message', 'Product Approved Sucessfully');
        return redirect()->back();   
    }

    public function newpbulkoption(Request $request){
        $selectption = $request->selectptions;
        if($selectption==0){
           $products = $request->products;
            foreach($products as $product){
                $product         =   Product::find($product);
                $product->status =   0;
                $product->save();
            } 
            Toastr::success('message', 'Product unpublished successfully!');
            return redirect('editor/new/product-request/manage');
        }elseif($selectption==1){
           $products = $request->products;
            foreach($products as $product){
                $product         =   Product::find($product);
                $product->request =   1;
                $product->status =   1;
                $product->save();
            } 
            Toastr::success('message', 'Product published successfully!');
            return redirect('editor/new/product-request/manage');
        } 
    }public function publishedbulkoption(Request $request){
        $selectption = $request->selectptions;
        $products = $request->products;
        foreach($products as $product){
            $product         =   Product::find($product);
            $product->request =   1;
            $product->status =   1;
            $product->save();
        } 
        Toastr::success('message', 'Product published successfully!');
        return redirect('editor/new/product-request/manage');
         
    }
    public function sellerproductupdate(Request $request){
        $this->validate($request,[
            'productcat'            =>  'required',
            'productsubcat'         =>  'required',
            'productname'           => 'required',
            'productnewprice'       =>  'required',
            'productdetails'        =>  'required',
            'productquantity'       =>  'required',
        ]);
        if($request->productoldprice > $request->productnewprice){
            $productdiscount = (($request->productoldprice - $request->productnewprice)*100) /$request->productoldprice;
        }else{
            $productdiscount = NULL;
        }

        $update_data = Product::find($request->hidden_id);
        $update_data->productcat           =     $request->productcat;
        $update_data->productsubcat        =     $request->productsubcat;
        $update_data->productchildcat      =     $request->productchildcat;
        $update_data->productbrand         =     $request->productbrand;
        $update_data->productname          =     strtolower($request->productname);
        $update_data->slug                 =     strtolower(preg_replace('/\s+/', '-', $request->productname));

        $update_data->sellerid             =     $request->sellerid;
        $update_data->productdiscount      =     $productdiscount;
        $update_data->productoldprice      =     $request->productoldprice;
        $update_data->productnewprice      =     $request->productnewprice;
        $update_data->productdetails       =     $request->productdetails;

        $update_data->productquantity      =     $request->productquantity;
        $update_data->additionalshipping      =     $request->additionalshipping;
        $update_data->productstyle      =     $request->productstyle;
        $update_data->productdetails      =     $request->productdetails;
        $update_data->productdetails2      =     $request->productdetails2;

        $update_data->request              =     1;
        $update_data->status               =     1;
        $update_data->save();

        $productId=$update_data->id;
        $update_images=Productimage::where('product_id',$productId)->get();

        $images = $request->file('image');
        if($images){
            foreach($images as $image)
            {
                $name =  $productId.'-'.$image->getClientOriginalName();
                $uploadpath = 'public/uploads/product/';
                 $imageUrl = $uploadpath.$name; 
                $img=Image::make($image->getRealPath());
                $img->orientate();
                $width = 400; // your max width
                $height = 400; // your max height
                $img->height() > $img->width() ? $width=null : $height=null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->text('Mart9294', 200, 200, function($font) {  
                $font->file(public_path('frontEnd/fonts/Roboto-Regular.ttf'));  
                $font->size(16); 
                $font->color('#e1e1e1');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(0);  
                }); 
              $img->save($imageUrl);

                $proimage= new Productimage();
                $proimage->product_id = $productId;
                $proimage->image=$imageUrl;
                $proimage->save(); 
            }
        }
        else{
            foreach($update_images as $update_image){
            $uimage=$update_image->image;
            $update_image->image    =   $uimage;
            $update_image->save();
            }
        }
        
        $update_data->sizes()->sync($request->proSize);
        $update_data->colors()->sync($request->productcolor);
        Toastr::success('message', 'Seller product update!');
        return redirect('editor/new/product-request/manage');

     }

      public function bulkproductupdate(Request $request){
        $bulkproducts = Cart::instance('bulkproducts')->content();
        $url=Session::get('sellerurl');
        if($request->quantitytype==1 && $request->pricetype==0){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                $productUpdate->productquantity = $request->productquantity;
                $productUpdate->save();
            }
        }elseif($request->quantitytype==1 && $request->pricetype==1){
           foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productnewprice <= $request->price){
                    if($productUpdate->productoldprice <= $request->price){
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }elseif($productUpdate->productnewprice > $request->price){
                    $productoldprice = $productUpdate->productoldprice ? $productUpdate->productoldprice:$productUpdate->productnewprice;
                    $productdiscount = (($productoldprice - $request->price)*100)/$productoldprice;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice=$request->price;
                    $productUpdate->productquantity = $request->productquantity;
                    $productUpdate->save();
                }
            }
            Cart::instance('bulkproducts')->destroy();
            return redirect($url);
        }elseif($request->quantitytype==1 && $request->pricetype==2){
            if($request->pricitypeper==""){
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);
                    $oldprice = $productUpdate->productnewprice;
                    $currentprice = $oldprice+$request->price;
                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
               }else{
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);

                    $oldprice = $productUpdate->productnewprice;
                    $discountprice = (($oldprice*($request->price))/100);
                    $currentprice = $oldprice+$discountprice;

                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }

                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
           }
            
        }elseif($request->quantitytype==1 && $request->pricetype==3){
            if($request->pricitypeper==""){
                foreach($bulkproducts as $bulkproduct){

                    $productUpdate = Product::find($bulkproduct->id);
                    $currentprice = $productUpdate->productnewprice-$request->price;
                    $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice=$currentprice;
                    $productUpdate->productquantity = $request->productquantity;
                    $productUpdate->save();
                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
               }else{
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);
                    
                    $discountprice = (($productUpdate->productnewprice*($request->price))/100);
                    $currentprice = $productUpdate->productnewprice-$discountprice;
                    $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productquantity = $request->productquantity;
                    $productUpdate->productnewprice = $currentprice;
                    $productUpdate->save();
                    Cart::instance('bulkproducts')->destroy();
                }
           }
           Cart::instance('bulkproducts')->destroy();
           return redirect($url);
        }elseif($request->quantitytype==2 && $request->pricetype==0){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                $productUpdate->save();
            }
            Cart::instance('bulkproducts')->destroy();
            return redirect($url);
        }elseif($request->quantitytype==2 && $request->pricetype==1){
           foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productnewprice <= $request->price){
                    if($productUpdate->productoldprice <= $request->price){
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }elseif($productUpdate->productnewprice > $request->price){
                    $productoldprice = $productUpdate->productoldprice ? $productUpdate->productoldprice:$productUpdate->productnewprice;
                    $productdiscount = (($productoldprice - $request->price)*100)/$productoldprice;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice=$request->price;
                    $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                    $productUpdate->save();
                }            
            }
            Cart::instance('bulkproducts')->destroy();
            return redirect($url);

        }elseif($request->quantitytype==2 && $request->pricetype==2){
            if($request->pricitypeper==""){
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);
                    $oldprice = $productUpdate->productnewprice;
                    $currentprice = $oldprice+$request->price;
                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
               }else{
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);

                    $oldprice = $productUpdate->productnewprice;
                    $discountprice = (($oldprice*($request->price))/100);
                    $currentprice = $oldprice+$discountprice;

                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $productUpdate->productquantity+$request->productquantity;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }

                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
           }
        }elseif($request->quantitytype==3 && $request->pricetype==0){
            // working this
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productquantity > $request->productquantity){
                    $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                    $productUpdate->save();
                }else{
                    Toastr::error('message', 'Requested quantity not valid');
                    return redirect($url);
                }
            }
            Cart::instance('bulkproducts')->destroy();
            return redirect($url);
        }elseif($request->quantitytype==3 && $request->pricetype==1){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productquantity >= $request->productquantity){
                    if($productUpdate->productnewprice <= $request->price){
                        if($productUpdate->productoldprice < $request->price){
                            $productUpdate->productnewprice = $request->price;
                            $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                            $productUpdate->productoldprice = NULL;
                            $productUpdate->productdiscount = NULL;
                            $productUpdate->save();
                        }else{
                            $productUpdate->productnewprice = $request->price;
                            $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                            $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                            $productUpdate->save();
                        }
                    }elseif($productUpdate->productnewprice > $request->price){
                        $productoldprice = $productUpdate->productoldprice ? $productUpdate->productoldprice:$productUpdate->productnewprice;
                        $productdiscount = (($productoldprice - $request->price)*100)/$productoldprice;
                        $productUpdate->productdiscount = $productdiscount;
                        $productUpdate->productnewprice=$request->price;
                        $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                        $productUpdate->save();
                    }
                }else{
                    Toastr::error('message', 'Requested quantity not valid');
                    return redirect($url);
                }
            }
           Cart::instance('bulkproducts')->destroy();
          return redirect($url);

        }elseif($request->quantitytype==3 && $request->pricetype==2){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productquantity > $request->productquantity){
                    if($request->pricitypeper==""){
                        foreach($bulkproducts as $bulkproduct){
                            $productUpdate = Product::find($bulkproduct->id);
                            $oldprice = $productUpdate->productnewprice;
                            $currentprice = $oldprice+$request->price;
                           if($productUpdate->productoldprice <= $currentprice){
                                $productUpdate->productnewprice = $currentprice;
                                $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                                $productUpdate->productoldprice = NULL;
                                $productUpdate->productdiscount = NULL;
                                $productUpdate->save();
                            }else{
                                $productUpdate->productnewprice = $currentprice;
                                $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                                $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                                $productUpdate->save();
                            }
                        }
                        Cart::instance('bulkproducts')->destroy();
                        return redirect($url);
                       }else{
                        foreach($bulkproducts as $bulkproduct){
                            $productUpdate = Product::find($bulkproduct->id);

                            $oldprice = $productUpdate->productnewprice;
                            $discountprice = (($oldprice*($request->price))/100);
                            $currentprice = $oldprice+$discountprice;

                           if($productUpdate->productoldprice <= $currentprice){
                                $productUpdate->productnewprice = $currentprice;
                                $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                                $productUpdate->productoldprice = NULL;
                                $productUpdate->productdiscount = NULL;
                                $productUpdate->save();
                            }else{
                                $productUpdate->productnewprice = $currentprice;
                                $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                                $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                                $productUpdate->save();
                                return $productUpdate;
                            }

                        }
                        Cart::instance('bulkproducts')->destroy();
                        return redirect($url);
                   }
                }else{
                    Toastr::error('message', 'Requested quantity not valid');
                    return redirect($url);
                }
            }

        }elseif($request->quantitytype==3 && $request->pricetype==3){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productquantity > $request->productquantity){
                     if($request->pricitypeper==""){
                        foreach($bulkproducts as $bulkproduct){

                            $productUpdate = Product::find($bulkproduct->id);
                            $currentprice = $productUpdate->productnewprice-$request->price;
                            $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;
                            $productUpdate->productdiscount = $productdiscount;
                            $productUpdate->productnewprice=$currentprice;
                            $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                            $productUpdate->save();
                        }
                        Cart::instance('bulkproducts')->destroy();
                        return redirect($url);
                       }else{
                        foreach($bulkproducts as $bulkproduct){
                            $productUpdate = Product::find($bulkproduct->id);
                            
                            $discountprice = (($productUpdate->productnewprice*($request->price))/100);
                            $currentprice = $productUpdate->productnewprice-$discountprice;
                            $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;;
                            $productUpdate->productdiscount = $productdiscount;
                            $productUpdate->productquantity = $productUpdate->productquantity-$request->productquantity;
                            $productUpdate->productnewprice = $currentprice;
                            $productUpdate->save();
                            Cart::instance('bulkproducts')->destroy();
                        }
                   }
                }else{
                    Toastr::error('message', 'Requested quantity not valid');
                    return redirect($url);
                }
            }
           Cart::instance('bulkproducts')->destroy();
           return redirect($url);

        }elseif($request->quantitytype==0 && $request->pricetype==1){
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                if($productUpdate->productnewprice <= $request->price){
                    if($productUpdate->productoldprice < $request->price){
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $request->price;
                        $productUpdate->productquantity = $request->productquantity;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }elseif($productUpdate->productnewprice > $request->price){
                    $productoldprice = $productUpdate->productoldprice ? $productUpdate->productoldprice:$productUpdate->productnewprice;
                    $productdiscount = (($productoldprice  - $request->price)*100)/$productoldprice;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice=$request->price;
                    $productUpdate->save();
                }
            }
            Cart::instance('bulkproducts')->destroy();
            return redirect($url);
        }elseif($request->quantitytype==0 && $request->pricetype==2){
          if($request->pricitypeper==""){
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);
                    $oldprice = $productUpdate->productnewprice;
                    $currentprice = $oldprice+$request->price;
                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }
                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
               }else{
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);

                    $oldprice = $productUpdate->productnewprice;
                    $discountprice = (($oldprice*($request->price))/100);
                    $currentprice = $oldprice+$discountprice;

                   if($productUpdate->productoldprice <= $currentprice){
                        $productUpdate->productnewprice = $currentprice;
                        $productUpdate->productoldprice = NULL;
                        $productUpdate->productdiscount = NULL;
                        $productUpdate->save();
                    }else{
                        $productUpdate->productnewprice = $currentprice;                        $productUpdate->productdiscount = (($productUpdate->productoldprice - $productUpdate->productnewprice)*100)/$productUpdate->productoldprice;
                        $productUpdate->save();
                    }

                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
           }
        }elseif($request->quantitytype==0 && $request->pricetype==3){
            if($request->pricitypeper==""){
                foreach($bulkproducts as $bulkproduct){

                    $productUpdate = Product::find($bulkproduct->id);
                    $currentprice = $productUpdate->productnewprice-$request->price;
                    $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice=$currentprice;
                    $productUpdate->save();
                }
                Cart::instance('bulkproducts')->destroy();
                return redirect($url);
               }else{
                foreach($bulkproducts as $bulkproduct){
                    $productUpdate = Product::find($bulkproduct->id);
                    
                    $discountprice = (($productUpdate->productnewprice*($request->price))/100);
                    $currentprice = $productUpdate->productnewprice-$discountprice;
                    $productdiscount = (($productUpdate->productoldprice - $currentprice)*100)/$productUpdate->productoldprice;;
                    $productUpdate->productdiscount = $productdiscount;
                    $productUpdate->productnewprice = $currentprice;
                    $productUpdate->save();
                 }

                 Cart::instance('bulkproducts')->destroy();
                 return redirect($url);
           }        
       }else{
            foreach($bulkproducts as $bulkproduct){
                $productUpdate = Product::find($bulkproduct->id);
                $productUpdate->status = $request->status;
                $productUpdate->additionalshipping = $request->additionalshipping;
                $productUpdate->save();
            }
          Cart::instance('bulkproducts')->destroy();
           return redirect($url);
        }
            
     }
     public function productadd(){
        $productSize = Size::where('status',1)->get();
        $productColors = Color::where('status',1)->get();
        $sellers = Seller::where('status',1)->get();
        return view('backEnd.productmanage.productupload',compact('productSize','productColors','sellers'));
     }

      public function productupload(Request $request){
        $this->validate($request,[
            'productcat'            =>  'required',
            'productsubcat'         =>  'required',
            'productname'            => 'required',
            'productnewprice'       =>  'required',
            'image'                 =>  'required',
            'productdetails'        =>  'required',
            'productquantity'        =>  'required',

        ]);
        if($request->productoldprice > $request->productnewprice){
            $productdiscount = (($request->productoldprice - $request->productnewprice)*100) /$request->productoldprice;
        }else{
            $productdiscount = NULL;
        }
        $productcode = mt_rand(10000000, 99999999);
        $upload_product                       =     new Product();
        $upload_product->productcat           =     $request->productcat;
        $upload_product->productsubcat        =     $request->productsubcat;
        $upload_product->productchildcat      =     $request->productchildcat;
        $upload_product->productbrand         =     $request->productbrand;
        $upload_product->productname          =     strtolower($request->productname);
        $upload_product->slug                 =     strtolower(preg_replace('/\s+/', '-', $request->productname));
        $upload_product->productcode          =     $productcode;
        $upload_product->productdiscount      =     $productdiscount;
        $upload_product->productoldprice      =     $request->productoldprice;
        $upload_product->productnewprice      =     $request->productnewprice;
        $upload_product->productstyle         =     $request->productstyle;
        $upload_product->productdetails       =     $request->productdetails;
        $upload_product->productdetails2       =     $request->productdetails2;
        $upload_product->productquantity      =     $request->productquantity;
        $upload_product->additionalshipping   =     $request->additionalshipping;
        $upload_product->sellerid             =     $request->sellerid;
        $upload_product->request              =     1;
        $upload_product->status               =     1;
        $upload_product->save();

        $productId=$upload_product->id;
        $images = $request->file('image');
        foreach($images as $image)
            {
                $name =  $productId.'-'.$image->getClientOriginalName();
                $uploadpath = 'public/uploads/product/';
                 $imageUrl = $uploadpath.$name; 
                $img=Image::make($image->getRealPath());
                $img->orientate();
                $width = 400; // your max width
                $height = 400; // your max height
                $img->height() > $img->width() ? $width=null : $height=null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->text('Mart9294', 200, 200, function($font) {  
                $font->file(public_path('frontEnd/fonts/Roboto-Regular.ttf'));  
                $font->size(18); 
                $font->color('#e1e1e1');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(0);  
                }); 
              $img->save($imageUrl);

                $proimage= new Productimage();
                $proimage->product_id = $productId;
                $proimage->image=$imageUrl;
                 $proimage->save(); 
            }

        $upload_product->sizes()->attach($request->productsize);
        $upload_product->colors()->attach($request->productcolor);

        $url=Session::get('sellerurl');
        return redirect($url);
    }

    public function productedit($id){
        $sellers = Seller::where('status',1)->get();
        $edit_data = Product::find($id);
        $productimage = DB::table('productimages')
        ->join('products','productimages.product_id','=','products.id')
        ->select('products.productname','productimages.*')
        ->orderBy('productimages.id','DESC')
        ->get();

        $categories=Category::where('status',1)->get();
        $categoryId = Product::find($id)->productcat;
        $subcategory = Subcategory::where('category_id','=',$categoryId)->get();
        $subcategoryId=Product::find($id)->productsubcat;

        $childcategory = Childcategory::where('subcategory_id','=',$subcategoryId)->get();
        $totalsizes = Size::where('status',1)->get();
        $productSize = Productsize::where('product_id',$id)->get();
        $totalcolors = Color::where('status',1)->get();
        $productColors = Productcolor::where('product_id',$id)->get();
        $totaltags = Tag::where('status',1)->get();
        $productTags = Producttag::where('product_id',$id)->get();
        return view('backEnd.productmanage.productedit',compact('sellers','edit_data','categories','subcategory','childcategory','totalsizes','productSize','totalcolors','productColors','productimage','productTags','totaltags')); 
    }

    public function updateproduct(Request $request){
        $this->validate($request,[
            'productcat'            =>  'required',
            'productsubcat'         =>  'required',
            'productname'           => 'required',
            'productnewprice'       =>  'required',
            'productdetails'        =>  'required',
            'productquantity'       =>  'required',
        ]);
        if($request->productoldprice > $request->productnewprice){
            $productdiscount = (($request->productoldprice - $request->productnewprice)*100) /$request->productoldprice;
        }else{
            $productdiscount = NULL;
        }
        $update_data = Product::find($request->hidden_id);
        $update_data->productcat           =     $request->productcat;
        $update_data->productsubcat        =     $request->productsubcat;
        $update_data->productchildcat      =     $request->productchildcat;
        $update_data->productbrand         =     $request->productbrand;
        $update_data->productname          =     strtolower($request->productname);
        $update_data->slug                 =     strtolower(preg_replace('/\s+/', '-', $request->productname));

        $update_data->sellerid             =     $request->sellerid;
        $update_data->productdiscount      =     $productdiscount;
        $update_data->productoldprice      =     $request->productoldprice;
        $update_data->productnewprice      =     $request->productnewprice;
        $update_data->productpoint         =     $request->productpoint;
        $update_data->productdetails       =     $request->productdetails;

        $update_data->productquantity      =     $request->productquantity;
        $update_data->additionalshipping   =     $request->additionalshipping;
        $update_data->productstyle         =     $request->productstyle;
        $update_data->productdetails       =     $request->productdetails;
        $update_data->productdetails2      =     $request->productdetails2;

        $update_data->request              =     1;
        $update_data->status               =     $request->status;
        $update_data->save();

        $productId=$update_data->id;
        $update_images=Productimage::where('product_id',$productId)->get();

        $images = $request->file('image');
        if($images){
            foreach($images as $image)
            {
                $name =  $productId.'-'.$image->getClientOriginalName();
                $uploadpath = 'public/uploads/product/';
                 $imageUrl = $uploadpath.$name; 
                $img=Image::make($image->getRealPath());
                $img->orientate();
                $width = 400; // your max width
                $height = 400; // your max height
                $img->height() > $img->width() ? $width=null : $height=null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->text('Ongona', 200, 200, function($font) {  
                $font->file(public_path('frontEnd/fonts/Roboto-Regular.ttf'));  
                $font->size(16); 
                $font->color('#e1e1e1');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(0);  
                }); 
              $img->save($imageUrl);

                $proimage= new Productimage();
                $proimage->product_id = $productId;
                $proimage->image=$imageUrl;
                $proimage->save(); 
            }
        }
        else{
            foreach($update_images as $update_image){
            $uimage=$update_image->image;
            $update_image->image    =   $uimage;
            $update_image->save();
            }
        }
        
        $update_data->sizes()->sync($request->proSize);
        $update_data->colors()->sync($request->productcolor);
        Toastr::success('message', 'product update successfully!');
        $url=Session::get('sellerurl');
        return redirect($url);

     }
     
     public function allproductmanage(){
         $products = DB::table('products')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->select('products.*','sellers.shopname','categories.catname','subcategoryName')
        ->orderBy('products.id','DESC')
        ->get();
        
         return view('backEnd.productmanage.allproductmanage',compact('products'));
     }
     
     public function productdelete($id)
     {
         $product = Product::find($id);
      if (!is_null($product)) {
        $product->delete();
      }
        Toastr::success('message', 'Product  delete successfully!');
        return redirect()->back();
     }
     
     
     public function productimagedelete($id)
     {
         
        $delete_data = Productimage::find($id);
        File::delete(public_path() . 'public/uploads/product', $delete_data->image);  
        $delete_data->delete();
        Toastr::success('message', 'Product image delete successfully!');
        return redirect()->back();
     }
     
     

}
