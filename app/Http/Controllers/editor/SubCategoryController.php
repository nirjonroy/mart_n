<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Subcategory;
use DB;
class SubCategoryController extends Controller
{
     public function index(){
     	$category = Category::where('status',1)->get();
    	return view('backEnd.subcategory.add',['category'=>$category]);
    }
    public function store(Request $request){
    	$this->validate($request,[
            'subcategoryName'=>'required',
            'category_id'=>'required',
    		'status'=>'required',
    	]);

    	$store_data                    = new Subcategory();
    	$store_data->subcategoryName   = $request->subcategoryName;
        $store_data->slug              =   Str::slug($request->get('subcategoryName'));
    	$store_data->category_id       = $request->category_id;
    	$store_data->status            = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'SubCategory add successfully!');
    	return redirect('/editor/subcategory/manage');
    }
    public function manage(){
        $show_data = DB::table('categories')
            ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
            ->select('subcategories.*', 'categories.catname')
            ->orderBy('id','DESC')
            ->get();
    	return view('backEnd.subcategory.manage',['show_data'=>$show_data]);
    }
     public function edit($id){
        $category = Category::where('status',1)->get();
        $edit_data = Subcategory::find($id);
        return view('backEnd.subcategory.edit', ['edit_data'=>$edit_data,'category'=>$category]);
    }
      public function update(Request $request){
        $update_data                     =   Subcategory::find($request->hidden_id);
        $update_data->subcategoryName    =    $request->subcategoryName;
        $update_data->slug               =   Str::slug($request->get('subcategoryName'));
        $update_data->category_id        =    $request->category_id;
        $update_data->status             =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Subcategory Update successfully!');
        return redirect('editor/subcategory/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Subcategory::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Subcategory active successfully!');
        return redirect('/editor/subcategory/manage');
    }

    public function active(Request $request){
        $publishId = Subcategory::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Subcategory active successfully!');
        return redirect('/editor/subcategory/manage');
    }
    
     public function Delete($id)
    {
       $category = Subcategory::find($id);
      if (!is_null($category)) {
 
        $category->delete();
      }
     Toastr::success('message', 'Subcategory Deleted successfully!');
      return back();

    }

}
