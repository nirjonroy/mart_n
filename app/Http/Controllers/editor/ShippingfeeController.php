<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Shippingfee ;
class ShippingfeeController extends Controller
{
    public function index(){
    	return view('backEnd.shippingfee.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'location'=>'required',
            'price'=>'required',
    		'status'=>'required',
    	]);


    	$store_data            = new Shippingfee();
    	$store_data->location  = $request->location;
    	$store_data->price     = $request->price;;
        $store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Shipping fee add successfully!');
    	return redirect('/editor/shippingfee/manage');
    }
    public function manage(){
    	$show_data = Shippingfee::orderBy('id','ASC')->get();
    	return view('backEnd.shippingfee.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =   Shippingfee::find($id);
        return view('backEnd.shippingfee.edit',[
            'edit_data'=>$edit_data
        ]);
    }
    public function update(Request $request){
        $update_data           =   Shippingfee::find($request->hidden_id);
        $update_data->location     =    $request->location;
        $update_data->price   =    $request->price;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Shipping fee Update successfully!');
        return redirect('editor/shippingfee/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =   Shippingfee::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'Shipping fee inactive successfully!');
        return redirect('editor/shippingfee/manage');   
    }
    public function active(Request $request){
        $published_data         =   Shippingfee::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'Shipping fee active successfully!');
        return redirect('editor/shippingfee/manage');   
    }
}
