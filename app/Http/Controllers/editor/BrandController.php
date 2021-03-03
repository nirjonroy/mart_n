<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Brand;
use App\Brandinsert;
use File;
use DB;
class BrandController extends Controller
{
    public function getSubcategory(Request $request){
        $category = DB::table("subcategories")
                    ->where("category_id",$request->category_id)
                    ->pluck('subcategoryName','id');
        return response()->json($category);
        }
        public function brandCat(){
            return response()->json();
        }
        public function brandcontent(){
            return view('backEnd.layouts.includes.brandcontant');
        }
    public function index(){
     	$category = Category::where('status',1)->get();
    	return view('backEnd.brand.add',compact('category'));

    }
    public function store(Request $request){
    	$this->validate($request,[
            'brandName'=>'required',
    		'status'=>'required',
    	]);

        // image upload
        $file = $request->file('image');
        $name = time().'-'.$file->getClientOriginalName();
        $uploadPath = 'public/uploads/brand/';
        $file->move($uploadPath,$name);
        $fileUrl =$uploadPath.$name;

    	$store_data                    = new Brand();
        $store_data->image = $fileUrl;
    	$store_data->brandName   	   = $request->brandName;
        $store_data->slug              =   Str::slug($request->get('brandName'));
    	$store_data->status            = $request->status;
    	$store_data->save();

        $brand_id = $store_data->id;
        $subcategories =$request->subcategory;
        foreach($subcategories as $subcategory){
            $brandarea = new Brandinsert();
            $brandarea->brand_id = $brand_id;
            $brandarea->subcat_id = $subcategory;
            $brandarea->save();
        }
    	Toastr::success('message', 'brand add successfully!');
    	return redirect('/editor/brand/manage');
    }
    public function requestbrandsave(Request $request){
        $this->validate($request,[
            'brandName'=>'required',
            'status'=>'required',
        ]);
        $update_request_data                    = Brand::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/brand/', $update_data->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/brand/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }

        $update_request_data->brandName         = $request->brandName;
        $update_request_data->slug              =   Str::slug($request->get('brandName'));
        $update_request_data->requestid         ='NULL';
        $update_request_data->status            = $request->status;
        $update_request_data->save();

        $brand_id = $update_request_data->id;
        $subcategories =$request->subcategory;
        foreach($subcategories as $subcategory){
            $brandarea = new Brandinsert();
            $brandarea->brand_id = $brand_id;
            $brandarea->subcat_id = $subcategory;
            $brandarea->save();
        }
        Toastr::success('message', 'brand add successfully!');
        return redirect('/editor/brand/manage');
    }
    public function manage(){
        $show_data =Brand::
             orderBy('id','DESC')
            ->get();
    	return view('backEnd.brand.manage',compact('show_data'));
    }
    public function brandrequest(){
        $brandrequest =Brand::
             where('requestid','!=','')
            ->orderBy('id','DESC')
            ->get();
        return view('backEnd.brand.brandrequest',compact('brandrequest'));
    }
     public function viewrequestbrand($id){
        $edit_data = Brand::find($id);
        return view('backEnd.brand.brandrequestview',compact('edit_data'));
    }
     public function edit($id){
        $edit_data = Brand::find($id);
        return view('backEnd.brand.edit',compact('edit_data'));
    }
      public function update(Request $request){

      	$update_brand = Brand::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/brand/', $update_brand->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/brand/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_brand->image;
        }
        $update_brand->brandName   	    = $request->brandName;
        $update_brand->slug              =   Str::slug($request->get('brandName'));
        $update_brand->image = $fileUrl;
    	$update_brand->status            = $request->status;
    	$update_brand->save();
    	
    	$brand_id = $update_brand->id;
        $subcategories =$request->subcategory;
        foreach($subcategories as $subcategory){
            $brandarea = new Brandinsert();
            $brandarea->brand_id = $brand_id;
            $brandarea->subcat_id = $subcategory;
            $brandarea->save();
        }
        Toastr::success('message', 'Brand Update successfully!');
        return redirect('editor/brand/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Brand::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Brand inactive successfully!');
        return redirect('/editor/brand/manage');
    }

    public function active(Request $request){
        $publishId = Brand::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Brand active successfully!');
        return redirect('/editor/brand/manage');
    }
    
    public function delete($id)
    {
        $brand = Brand::find($id);
      if (!is_null($brand)) {
        // Delete brand image
        if (File::exists('public/uploads/brand/'.$brand->image)) {
          File::delete('public/uploads/brand/'.$brand->image);
        }
        $brand->delete();
      }
     Toastr::success('message', 'Brand Deleted successfully!');
      return back();
    }
}
