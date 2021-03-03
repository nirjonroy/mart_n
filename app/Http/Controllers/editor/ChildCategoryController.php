<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Subcategory;
use App\Childcategory;
use DB;
class ChildCategoryController extends Controller
{
    public function index(){
     	$subcategory = Subcategory::where('status',1)->get();
    	return view('backEnd.childcategory.add',compact('subcategory'));
    }
    public function store(Request $request){
    	$this->validate($request,[
            'childcategoryName'=>'required',
            'subcategory_id'=>'required',
    		'status'=>'required',
    	]);

    	$store_data                    = new Childcategory();
    	$store_data->childcategoryName   = $request->childcategoryName;
        $store_data->slug              =  strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '',preg_replace('/\s+/', '-', $request->childcategoryName)));
    	$store_data->subcategory_id       = $request->subcategory_id;
    	$store_data->status            = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'child category add successfully!');
    	return redirect('/editor/childcategory/manage');
    }
    public function manage(){
        $show_data = DB::table('childcategories')
            ->join('subcategories', 'childcategories.subcategory_id', '=', 'subcategories.id')
            ->select('childcategories.*', 'subcategories.subcategoryName')
            ->orderBy('id','DESC')
            ->get();
    	return view('backEnd.childcategory.manage',['show_data'=>$show_data]);
    }
     public function edit($id){
        $subcategory = Subcategory::where('status',1)->get();
        $edit_data = Childcategory::find($id);
        return view('backEnd.childcategory.edit',compact('subcategory','edit_data'));
    }
      public function update(Request $request){
        $update_data                     =   Childcategory::find($request->hidden_id);
        $update_data->childcategoryName  =    $request->childcategoryName;
        $update_data->slug               =   strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '',preg_replace('/\s+/', '-', $request->childcategoryName)));
        $update_data->subcategory_id     =    $request->subcategory_id;
        $update_data->status             =    $request->status;
        $update_data->save();
        Toastr::success('message', 'child Update successfully!');
        return redirect('editor/childcategory/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Childcategory::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'child category active successfully!');
        return redirect('/editor/childcategory/manage');
    }

    public function active(Request $request){
        $publishId = Childcategory::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Child category active successfully!');
        return redirect('/editor/childcategory/manage');
    }
    
     public function Delete($id)
    {
       $category = Childcategory::find($id);
      if (!is_null($category)) {
        
        $category->delete();
      }
     Toastr::success('message', 'Childcategory Deleted successfully!');
      return back();

    }

}
