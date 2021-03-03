<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Tag;
class TagController extends Controller
{
    public function index(){
    	return view('backEnd.tag.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'name'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Tag();
        $store_data->name      = $request->name;
        $store_data->slug      = strtolower(preg_replace('/\s+/', '-', $request->name));
    	$store_data->status      = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Tag add successfully!');
    	return redirect('/editor/product-tag/manage');
    }
    public function manage(){
    	$show_data = Tag::all();
    	return view('backEnd.tag.manage',compact('show_data'));
    }
    public function edit($id){
        $edit_data =   Tag::find($id);
        return view('backEnd.tag.edit',compact('edit_data'));
    }

    public function update(Request $request){
        $update_data           =   Tag::find($request->hidden_id);
        $update_data->name     =    $request->name;
        $update_data->slug     =    strtolower(preg_replace('/\s+/', '-', $request->name));
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'service Update successfully!');
        return redirect('editor/product-tag/manage');
    } 
    public function inactive(Request $request){
        $unpublish_data = Tag::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Tag unpublished successfully!');
        return redirect('/editor/product-tag/manage');
    }

    public function active(Request $request){
        $publishId = Tag::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Tag published successfully!');
        return redirect('/editor/product-tag/manage');
    }
     public function destroy(Request $request){
        $deleteId = Tag::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'Tag  delete successfully!');
        return redirect('/editor/product-tag/manage');
    }
}
