<?php
namespace App\Http\Controllers\frontEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Slider;
use App\Brand;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Childcategory;
use App\District;
use App\Customer;
use App\Advertisment;
use App\News;
use App\Contact;
use App\Createpage;
use App\Seller;
use App\Banner;
use App\Color;
use App\Productcolor;
use App\Brandinsert;
use App\Review;
use App\Offer;
use DB;
use Cart;
use Session;
class frontEndController extends Controller
{
    
    public function index(){
        $sliders= Slider::where(['status'=>1])
        ->orderBy('id','DESC')
        ->get();
        // slider end
        $whatisnew = Product::where(['status'=>1,'request'=>1])->orderBy('id','DESC')->limit(12)->get();

        $homecategories = Category::where(['status'=>1,'frontPage'=>1])->get();
        
        $homecategoryshow = Category::where(['status'=>1])->limit(8)->get();
        $homebrandshow = Brand::where(['status'=>1])->limit(8)->get();
        $homeshopshow = Seller::where(['status'=>1])->limit(8)->get();
        
        return view('frontEnd.index',compact('sliders','homecategories','whatisnew','homecategoryshow','homebrandshow','homeshopshow'));
    }
  
    public function allcategory(){
         $allcategory = Category::where(['status'=>1])->get();
        return view('frontEnd.layouts.pages.allcategory',compact('allcategory'));
    }
    public function shops(){
        return view('frontEnd.layouts.pages.shops');
    }
    public function specialoffer(){
        $products = DB::table('products')
            ->where(['products.request'=>1,'products.status'=>1])
            ->where('products.productpoint','!=','NULL')
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->paginate(40);
        return view('frontEnd.layouts.pages.specialoffer',compact('products'));
    }

    public function brands(){
        return view('frontEnd.layouts.pages.brands');
    }

    public function brandsproducts($slug,$catid){
        $products = 
        DB::table('products')
        ->join('categories','products.productcat','=','categories.id')
        ->join('subcategories','products.productsubcat','=','subcategories.id')
        ->join('brands','products.productbrand','=','brands.id')
        ->join('sellers','products.sellerid','=','sellers.id')
        ->where('products.status',1)
        ->where('products.request',1)
        ->where('products.productbrand',$catid)
        ->orderBy('products.id','DESC')
         ->select('products.*','categories.catname','subcategories.subcategoryName','sellers.shopname','sellers.shopname')
        ->paginate(40);
        return view('frontEnd.layouts.pages.brandproduct',compact('products'));
    }
    public function newproduct(){
        $products =Product::where(['status'=>1,'request'=>1])->orderBy('id','DESC')->paginate(40);
        return view('frontEnd.layouts.pages.newproduct',compact('products'));
    }
    public function vandorshop ($slug,$catid){
        $vandorshop = Seller::where(['status'=>1,'id'=>$catid])->first();
        $totalproducts = Product::where(['status'=>1,'sellerid'=>$catid])->get();
        $products = Product::where(['status'=>1,'sellerid'=>$catid])
        ->orderBy('id','DESC')
        ->paginate(40);
        if($vandorshop){
            return view('frontEnd.layouts.pages.seller.vandorshop',compact('vandorshop','products','totalproducts'));
        }else{
            return redirect()->back()->with('error','Opps! page not found');
        }
        
    }
    public function category(Request $request,$slug,$catid){
        if(isset($request->sort)){
            // sorting code
            if($request->sort==1){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.id','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==2){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.id','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==3){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.productnewprice','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==4){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.productnewprice','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==5){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }else{
                $products = DB::table('products')
                ->join('subcategories','products.proSubcategory','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }
        }elseif(isset($request->subcategory)){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->whereIn('products.productsubcat',explode(',',  $request->subcategory))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->discount)){
            // return $request->discount;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->where('products.productdiscount','<=',$request->discount)
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->minprice)){
            $pricerange = array_map('intval', json_decode($request->minprice));;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->whereBetween('products.productnewprice',[$pricerange])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->color)){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
           ->join('productcolors','products.id','=','productcolors.product_id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->whereIn('productcolors.color_id',explode(',',  $request->color))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->brand)){
            // return $request->brand;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')            ->where(['products.request'=>1,'products.status'=>1])
            ->whereIn('products.productbrand',explode(',',  $request->brand))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif($request->default){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('categories','products.productcat','=','categories.id')
            ->where(['products.productcat'=>$catid,'products.request'=>1,'products.status'=>1])
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->paginate(40);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }else{
            $subcategories = Subcategory::where(['category_id'=>$catid,'status'=>1])->get();
            // show by category banner
            $minprice = DB::table('products')
           ->join('categories','products.productcat','=','categories.id')
            ->where(['products.productcat'=>$catid,'products.request'=>1,'products.status'=>1])
            ->select('products.*')
            ->orderBy('products.productnewprice','ASC')
            ->min('products.productnewprice');
            $maxprice =  DB::table('products')
           ->join('categories','products.productcat','=','categories.id')
            ->where(['products.productcat'=>$catid,'products.request'=>1,'products.status'=>1])
            ->max('products.productnewprice');

            $products = DB::table('products')
           ->join('categories','products.productcat','=','categories.id')
            ->where(['products.productcat'=>$catid,'products.request'=>1,'products.status'=>1])
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->paginate(40);
            $bredcrumb=Category::find($catid);
            if($bredcrumb){
            return view('frontEnd.layouts.pages.category',compact('minprice','maxprice','bredcrumb','subcategories','products'));
            }else{
                 return view('errors.404');
            }
        }    
    }
    public function subcategory($slug,$id,Request $request){
        if(isset($request->sort)){
            // sorting code
            if($request->sort==1){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.id','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==2){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.id','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==3){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.productnewprice','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==4){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.productnewprice','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==5){
                $products = DB::table('products')
                ->join('subcategories','products.productsubcat','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }else{
                $products = DB::table('products')
                ->join('subcategories','products.proSubcategory','=','subcategories.id')
                ->select('products.*','subcategories.subcategoryName')
                ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }
        }elseif(isset($request->subcategory)){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->whereIn('products.productchildcat',explode(',',  $request->subcategory))
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->discount)){
            // return $request->discount;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
            ->where('products.productdiscount','<=',$request->discount)
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->minprice)){
            $pricerange = array_map('intval', json_decode($request->minprice));;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
            ->whereBetween('products.productnewprice',[$pricerange])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->color)){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
           ->join('productcolors','products.id','=','productcolors.product_id')
            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
            ->whereIn('productcolors.color_id',explode(',',  $request->color))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->brand)){
            // return $request->brand;
            $products = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
            ->whereIn('products.productbrand',explode(',',  $request->brand))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif($request->default){
            // return $request->subcategory;
            $products = DB::table('products')
            ->join('subcategories','products.productsubcat','=','subcategories.id')            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$request->default])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->paginate(34);;
            return view('frontEnd.layouts.includes.product',compact('products'));
        }else{
            $products = DB::table('products')
            ->join('subcategories','products.productsubcat','=','subcategories.id')            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$id])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->paginate(40);
            $totalprocuct = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.productsubcat'=>$id,'products.request'=>1,'products.status'=>1])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->count();
            $subcategory=Subcategory::find($id);
            $childcategories = Childcategory::where(['subcategory_id'=>$id,'status'=>1])->paginate(34);
            // return $childcategories;
            $minprice = DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.productsubcat'=>$id,'products.request'=>1,'products.status'=>1])
            ->select('products.*')
            ->orderBy('products.productnewprice','ASC')
            ->min('products.productnewprice');
            $maxprice =  DB::table('products')
           ->join('subcategories','products.productsubcat','=','subcategories.id')
            ->where(['products.productsubcat'=>$id,'products.request'=>1,'products.status'=>1])
            ->max('products.productnewprice');
            // return $products;
            if($childcategories){
                // return $childcategoryName;
            return view('frontEnd.layouts.pages.subcategory',compact('products','subcategory','childcategories','minprice','maxprice','totalprocuct'));
            }else{
                 return view('errors.404');
            }
        }    
    }

    public function products($slug,$id,Request $request){
        if(isset($request->sort)){
            // sorting code
            if($request->sort==1){
                $products = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                    ->select('products.*')
                    ->where('products.productchildcat',$id)
                    ->where(['products.status'=>1,'products.request'=>1])
                ->orderBy('products.id','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==2){
                $products = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->select('products.*')
                ->where('products.productchildcat',$id)
                ->where(['products.status'=>1,'products.request'=>1])                ->orderBy('products.id','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==3){
                $products = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->select('products.*')
                ->where('products.productchildcat',$id)
                ->where(['products.status'=>1,'products.request'=>1])
                ->orderBy('products.productnewprice','ASC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==4){
                $products = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->select('products.*')
                ->where('products.productchildcat',$id)
                ->where(['products.status'=>1,'products.request'=>1])
                ->orderBy('products.productnewprice','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }elseif($request->sort==5){
                $products = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->select('products.*')
                ->where('products.productchildcat',$id)
                ->where(['products.status'=>1,'products.request'=>1])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }else{
                $products = DB::table('products')
                    ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->select('products.*','childcategories.childcategoryName')
                ->where('products.productchildcat',$id)
                ->where(['products.status'=>1,'products.request'=>1])
                ->orderBy('products.productname','DESC')
                 ->paginate(40);
                  response()->json($products);
                  return view('frontEnd.layouts.includes.product',compact('products'));
            }
        }elseif(isset($request->subcategory)){
            // return $request->subcategory;
            $products = DB::table('products')
           ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->where(['products.request'=>1,'products.status'=>1])
            ->whereIn('products.productchildcat',explode(',',  $request->subcategory))
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->discount)){
            // return $request->discount;
            $products = DB::table('products')
           ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->select('products.*','childcategories.childcategoryName')
            ->where('products.productchildcat',$id)
            ->where(['products.status'=>1,'products.request'=>1])
            ->where('products.productdiscount','<=',$request->discount)
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->minprice)){
            $pricerange = array_map('intval', json_decode($request->minprice));;
            $products = DB::table('products')
            ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->select('products.*','childcategories.childcategoryName')
            ->where('products.productchildcat',$id)
            ->where(['products.status'=>1,'products.request'=>1])
            ->whereBetween('products.productnewprice',[$pricerange])
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->color)){
            // return $request->subcategory;
            $products = DB::table('products')
            ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->select('products.*','childcategories.childcategoryName')
            ->where('products.productchildcat',$id)
            ->where(['products.status'=>1,'products.request'=>1])
            ->whereIn('productcolors.color_id',explode(',',  $request->color))
            ->orderBy('products.id','DESC')
            ->select('products.*')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif(isset($request->brand)){
            // return $request->brand;
            $products = DB::table('products')
            ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->select('products.*','childcategories.childcategoryName')
            ->where('products.productchildcat',$id)
            ->where(['products.status'=>1,'products.request'=>1])
            ->whereIn('products.productbrand',explode(',',  $request->brand))
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->get();
            response()->json($products);
            return view('frontEnd.layouts.includes.product',compact('products'));
        }elseif($request->default){
            // return $request->subcategory;
            $products = DB::table('products')
            ->join('subcategories','products.productsubcat','=','subcategories.id')            ->where(['products.request'=>1,'products.status'=>1,'products.productsubcat'=>$request->default])
            ->orderBy('products.id','DESC')
            ->select('products.*','subcategories.subcategoryName')
            ->paginate(34);;
            return view('frontEnd.layouts.includes.product',compact('products'));
        }else{
            $products = DB::table('products')
            ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->select('products.*','childcategories.childcategoryName')
            ->where('products.productchildcat',$id)
            ->where(['products.status'=>1,'products.request'=>1])
            ->orderBy('products.id','DESC')
             ->paginate(40);
            $bredcrumb=Childcategory::find($id);
            $subcategory = Subcategory::where('id',$bredcrumb->subcategory_id)->first();
            $brands = Brandinsert::where(['subcat_id'=>$subcategory->id])->get();
            $childcategories = Childcategory::where(['subcategory_id'=>$id,'status'=>1])->get();
            $minprice = DB::table('products')
                ->join('childcategories','products.productchildcat','=','childcategories.id')
                ->where(['products.productchildcat'=>$id,'products.request'=>1,'products.status'=>1])
                ->min('products.productnewprice');
             $maxprice =  DB::table('products')
            ->join('childcategories','products.productchildcat','=','childcategories.id')
            ->where(['products.productchildcat'=>$id,'products.request'=>1,'products.status'=>1])
            ->max('products.productnewprice');
            if($bredcrumb){
            return view('frontEnd.layouts.pages.childproduct',compact('products','bredcrumb','childcategories','minprice','maxprice','brands'));
            }
            else{
                 return view('errors.404');
            }
        }    
    }

    public function offer(){
        $alloffers = Offer::where('status',1)->get();
        return view('frontEnd.layouts.pages.offer',compact('alloffers'));
    }

    public function details($slug,$catid){
        $productdetails = DB::table('products')
        ->where(['id'=>$catid,'status'=>1,'request'=>1])
        ->orderBy('products.id','DESC')
        ->first();
        if($productdetails){
        $sellerinfo= Seller::where(['status'=>1,'id'=>$productdetails->sellerid])
        ->first();

        $relatedproduct = DB::table('products')
        ->where(['products.productsubcat'=>$productdetails->productsubcat,'status'=>1])
        ->orderBy('products.id','DESC')
        ->paginate(20);

         $selectsizes = DB::table('productsizes')
          ->join('sizes','productsizes.size_id','=','sizes.id')
            ->where('productsizes.product_id',$catid)
            ->orderBy('id','ASC')
            ->select('productsizes.*','sizes.sizeName')
            ->get();
         $selectcolors = DB::table('productcolors')
          ->join('colors','productcolors.color_id','=','colors.id')
            ->where('productcolors.product_id',$catid)
            ->orderBy('id','ASC')
            ->select('productcolors.*','colors.colorName')
            ->get();

            $productbrand = DB::table('products')
            ->join('brands','products.productbrand','=','brands.id')
            ->where('products.id',$catid)
            ->select('products.*','brands.brandName')
            ->first();

            $allReview=Review::where('product_id',$productdetails->id)
            ->get();
        return view('frontEnd.layouts.pages.details',compact('productdetails','relatedproduct','selectcolors','selectsizes','sellerinfo','productbrand','allReview'));
        }
        else{
             return redirect('404');
        }
    }


    public function shipping(){
        $customerId = Session::get('customerId');
        if($customerId){
            // Session::put('cshippingfee',0);
            $districts = District::where('status',1)->get();
            return view('frontEnd.layouts.pages.shipping',compact('districts'));
        }else{
            return redirect('customer/login')->with('warning','Opps! please login first');
        }
    }
    public function contactus(){
        $contactinfo=Contact::where('id',1)->limit(1)
        ->orderBy('id','DESC')->get();
        return view('frontEnd.layouts.pages.contact',compact('contactinfo'));
    }
    public function moreinfo($slug,$catid){
        $moreinfoes=Createpage::where(['page_id'=>$catid,'status'=>1])->first();
        if($moreinfoes){
        return view('frontEnd.layouts.pages.moreinfo',compact('moreinfoes'));
    }else{
        return view('errors.404');
        }
    }
    public function errorpage(){
        return view('errors.404');
    }
}
