<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
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
use Session;
use Image;
use Alert;
class ProductController extends Controller
{
    public function validSeller(){
        $checkSeller= Session::get('SellerId');
        $sellerInfo=Seller::find($checkSeller);
        return $sellerInfo;
    }
	// ajax code
	public function subcategory(Request $request){
            $category = DB::table("subcategories")
                        ->where("category_id",$request->category_id)
                        ->pluck('subcategoryName','id');
            return response()->json($category);
        }
        public function childcategory(Request $request){
            $childcategory = DB::table("childcategories")
                        ->where("subcategory_id",$request->category_id)
                        ->pluck("childcategoryName","id");
            return response()->json($childcategory);
        }
		// ajax code
        public function subcatbrand(Request $request){
            $productbrand = DB::table("brandinserts")
            ->join('brands','brandinserts.brand_id','=','brands.id')
            ->where("subcat_id",$request->category_id)
            ->pluck('brands.brandName','brands.id');
            return response()->json($productbrand);
        }
        // ajax code
     public function sellernewproduct(){
        if($this->validSeller()){
            $productSize = Size::where('status',1)->get();
            $productColors = Color::where('status',1)->get();
            $producttags = Tag::where('status',1)->get();
            return view('frontEnd.layouts.pages.seller.newproduct',compact('productSize','productColors','producttags'));
            }else{
            return redirect('login/seller')->with('warning','Opps! Please login first');
          }
        }
     public function productupload(Request $request){
        $this->validate($request,[
            'productcat'			=>	'required',
            'productsubcat'		    =>	'required',
            'productname'		     =>	'required',
    		'productnewprice'		=>	'required',
    		'image'					=>	'required',
    		'productdetails'		=>	'required',
            'productquantity'        =>  'required',

    	]);
        // count discount
        if($request->productoldprice > $request->productnewprice){
            $productdiscount = (($request->productoldprice - $request->productnewprice)*100) /$request->productoldprice;
        }else{
            $productdiscount = NULL;
        }
        $productcode = mt_rand(10000000, 99999999);
    	$store_data           	 		  = 	new Product();
    	$store_data->productcat      	  = 	$request->productcat;
    	$store_data->productsubcat  	  = 	$request->productsubcat;
    	$store_data->productchildcat 	  = 	$request->productchildcat;
    	$store_data->productbrand  		  = 	$request->productbrand;
    	$store_data->productname  		  = 	strtolower($request->productname);
        $store_data->slug                 =     strtolower(preg_replace('/\s+/', '-', $request->productname));
    	$store_data->productcode    	  = 	$productcode;
        $store_data->productdiscount      =     $productdiscount;
        $store_data->productoldprice      =     $request->productoldprice;
    	$store_data->productnewprice  	  = 	$request->productnewprice;
        $store_data->productstyle         =     $request->productstyle;
    	$store_data->productdetails       = 	$request->productdetails;
        $store_data->productdetails2      =     $request->productdetails2;
    	$store_data->productquantity      = 	$request->productquantity;
        $store_data->additionalshipping   =     $request->additionalshipping;
        $store_data->sellerid             =     Session::get('SellerId');
        $store_data->request              =     0;
    	$store_data->status    		      = 	0;
    	$store_data->save();

        $productId=$store_data->id;
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

        $store_data->sizes()->attach($request->productsize);
        $store_data->colors()->attach($request->productcolor);
        $store_data->tags()->attach($request->producttag);

    	return redirect('me/seller/manage/product')->with('success','Product information upload successfully!');
    }
     public function sellermanageproduct(){
        if($this->validSeller()){
         $sellerid=Session::get('SellerId');
         $show_datas= DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->select('products.*','categories.catname','subcategories.subcategoryName')
        ->orderBy('id','DESC')
        ->where('sellerid',$sellerid)
        ->get();
     	return view('frontEnd.layouts.pages.seller.manageproduct',compact('show_datas'));
         }else{
            return redirect('login/seller')->with('warning','Opps! Please login first');
         }
     }

     public function productedit($id){
        $edit_data = Product::where(['id'=>$id,'sellerid'=>Session::get('SellerId')])->first();
        
        if($edit_data !=NULL){
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
        return view('frontEnd.layouts.pages.seller.editproduct',compact('edit_data','categories','subcategory','childcategory','totalsizes','productSize','totalcolors','productColors','productimage','productTags','totaltags'));
     
        }else{
          return redirect()->back();  
        }
        }

    

     public function productupdate(Request $request){
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

        $update_data->productcode          =     $request->productcode;
        $update_data->productdiscount       =     $productdiscount;
        $update_data->productoldprice       =     $request->productoldprice;
        $update_data->productnewprice      =     $request->productnewprice;
        $update_data->productdetails       =     $request->productdetails;
        $update_data->productdetails2      =     $request->productdetails2;

        $update_data->productquantity      =     $request->productquantity;
        $update_data->productstyle         =     $request->productstyle;
        $update_data->sellerid             =     Session::get('SellerId');

        $update_data->request              =     2;
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
            $update_data->tags()->sync($request->producttag);

        return redirect('me/seller/manage/product')->with('success','Product information Update successfully!');

     }

     
      public function inactive(Request $request){
		$Unpublished_data			=	Product::find($request->hidden_id);
		$Unpublished_data->status 	=	0;
		$Unpublished_data->save();
		Toastr::success('message', 'Product unpublished successfully!');
		return redirect('editor/product/manage');	
	}
	public function active(Request $request){
		$published_data			=	Product::find($request->hidden_id);
		$published_data->status 	=	1;
		$published_data->save();
		Toastr::success('message', 'Product published successfully!');
		return redirect('editor/product/manage');	
	}
     public function productimgdel($id){
        $delete_img = Productimage::find($id);
        $delete_img->delete();
        Toastr::success('message', 'advertisments image  delete successfully!');
        return redirect()->back();
    }

	public function productdelete(Request $request){
		$delete_data = Product::where(['id'=>$request->hidden_id,'sellerid'=>Session::get('SellerId')])->first();
		$delete_data->delete();
		$proimages = Productimage::where('product_id',$request->hidden_id)->get();
		foreach($proimages as $proimage){
		    $delete_img = Productimage::find($proimage->id);
            $delete_img->delete();
		}
		Toastr::success('message', 'Product delete successfully!');
		return redirect('me/seller/manage/product');	
	}
    
}
