<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use File;
class CategoryController extends Controller
{
    public function index(){
    	return view('backEnd.category.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'catname'=>'required',
            'image'=>'required',
    		'status'=>'required',
    	]);

        $lastid=Category::orderBy('id','DESC')->limit(1,0)->first();
        if($lastid!=NULL){
             $base1 = 1;
             $base = $lastid->id;
             $level = $base1 + $base;
        }else{
                $base1 = 1;
                $base = 0;
                $level = $base1 + $base;
        }

        // image upload
        $file = $request->file('image');
        $name = time().'-'.$file->getClientOriginalName();
        $uploadPath = 'public/uploads/category/';
        $file->move($uploadPath,$name);
        $fileUrl =$uploadPath.$name;

    	$store_data            = new Category();
        $store_data->image = $fileUrl;
    	$store_data->frontPage      = $request->frontPage;
        $store_data->catname      = $request->catname;
        $store_data->slug      = strtolower(preg_replace('/\s+/', '-', $request->catname));
        $store_data->level    = $level;
        $store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Category add successfully!');
    	return redirect('/editor/category/manage');
    }
    public function manage(){
    	$show_data = Category::orderBy('level','ASC')->get();
    	return view('backEnd.category.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =   Category::find($id);
        return view('backEnd.category.edit',[
            'edit_data'=>$edit_data
        ]);
    }
    public function menusort($id){
        $change_level =   Category::find($id);
        return view('backEnd.category.menusort',compact('change_level'));
    }

    public function menusortupdate(Request $request){

        $update_level           =   Category::find($request->hidden_id);
        $old_level           =   Category::where('level',$request->level)->first();
        $old_level->level    =    $update_level->level;
        $old_level->save();
        $update_level->name     =    $request->name;
        $update_level->slug      =   strtolower(preg_replace('/\s+/', '-', $request->name));
        $update_level->level    =    $request->level;
        $update_level->status   =    $request->status;
        $update_level->save();

        
        Toastr::success('message', 'Category Update successfully!');
        return redirect('editor/category/manage');
    }
    public function update(Request $request){
        $this->validate($request,[
            'catname'=>'required',
            'status'=>'required',
        ]);

        $update_data   =   Category::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/category/', $update_data->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/category/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }
        $update_data->catname     =    $request->catname;
        $update_data->slug      =   strtolower(preg_replace('/\s+/', '-', $request->catname));
        $update_data->image = $fileUrl;        $update_data->frontPage   =    $request->frontPage;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Category Update successfully!');
        return redirect('editor/category/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =   Category::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'Category inactive successfully!');
        return redirect('editor/category/manage');   
    }
    public function active(Request $request){
        $published_data         =   Category::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'Category active successfully!');
        return redirect('editor/category/manage');   
    }
    
    
    public function Delete($id)
    {
         $category = Category::find($id);
      if (!is_null($category)) {
        // Delete brand image
        if (File::exists('public/uploads/category/'.$category->image)) {
          File::delete('public/uploads/category/'.$category->image);
        }
        $category->delete();
      }
     Toastr::success('message', 'Category Deleted successfully!');
      return back();

    }

   
}
