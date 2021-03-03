<?php

namespace App\Http\Controllers\editor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Size;
class sizeController extends Controller
{
     public function index(){
    	return view('backEnd.size.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'sizeName'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Size();
        $store_data->sizeName      = $request->sizeName;
        $store_data->slug      = strtolower(preg_replace('/\s+/', '-', $request->sizeName));
    	$store_data->status      = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'size add successfully!');
    	return redirect('/editor/product-size/manage');
    }
    public function manage(){
    	$show_data = Size::all();
    	return view('backEnd.size.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =   Size::find($id);
        return view('backEnd.size.edit',[
            'edit_data'=>$edit_data
        ]);
    }

    public function update(Request $request){
        $update_data           =   Size::find($request->hidden_id);
        $update_data->sizeName     =    $request->sizeName;
        $update_data->slug      =   strtolower(preg_replace('/\s+/', '-', $request->sizeName));
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'service Update successfully!');
        return redirect('editor/product-size/manage');
    } 
    public function inactive(Request $request){
        $unpublish_data = Size::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Service  unpublished successfully!');
        return redirect('/editor/product-size/manage');
    }

    public function active(Request $request){
        $publishId = Size::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Service  published successfully!');
        return redirect('/editor/product-size/manage');
    }
     public function destroy(Request $request){
        $deleteId = Size::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'Size  delete successfully!');
        return redirect('/editor/product-size/manage');
    }
}
