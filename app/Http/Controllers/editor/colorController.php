<?php

namespace App\Http\Controllers\editor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Color;
class colorController extends Controller
{
     public function index(){
    	return view('backEnd.color.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'colorName'=>'required',
            'color'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Color();
        $store_data->colorName      = $request->colorName;
        $store_data->slug      = strtolower(preg_replace('/\s+/', '-', $request->colorName));
        $store_data->color      = $request->color;
    	$store_data->status      = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'color add successfully!');
    	return redirect('/editor/product-color/manage');
    }
    public function manage(){
    	$show_data = Color::all();
    	return view('backEnd.color.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =   Color::find($id);
        return view('backEnd.color.edit',[
            'edit_data'=>$edit_data
        ]);
    }

    public function update(Request $request){
        $this->validate($request,[
            'colorName'=>'required',
            'color'=>'required',
            'status'=>'required',
        ]);
        $update_data           =   Color::find($request->hidden_id);
        $update_data->color     =    $request->color;
        $update_data->colorName     =    $request->colorName;
        $update_data->slug      =   strtolower(preg_replace('/\s+/', '-', $request->colorName));
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Color Update successfully!');
        return redirect('editor/product-color/manage');
    } 
    public function inactive(Request $request){
        $unpublish_data = Color::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Color  unpublished successfully!');
        return redirect('/editor/product-color/manage');
    }

    public function active(Request $request){
        $publishId = Color::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Color  published successfully!');
        return redirect('/editor/product-color/manage');
    }
     public function destroy(Request $request){
        $deleteId = Color::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'color  delete successfully!');
        return redirect('/editor/product-color/manage');
    }
}
