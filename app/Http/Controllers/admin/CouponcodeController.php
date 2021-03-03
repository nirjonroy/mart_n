<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Couponcode;

class CouponcodeController extends Controller
{
     public function index(){
    	return view('backEnd.couponcode.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'couponcode'=>'required',
            'expairdate'=>'required',
            'offertype'=>'required',
            'amount'=>'required',
    		'buyammount'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Couponcode();
    	$store_data->couponcode      = $request->couponcode;
    	$store_data->expairdate      = $request->expairdate;
    	$store_data->offertype      = $request->offertype;
    	$store_data->amount      = $request->amount;
    	$store_data->buyammount      = $request->buyammount;
    	$store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Coupon Code add successfully!');
    	return redirect('/admin/couponcode/manage');
    }
    public function manage(){
    	$show_data = Couponcode::all();
    	return view('backEnd.couponcode.manage',compact('show_data'));
    }
    public function edit($id){
        $edit_data =   Couponcode::find($id);
        return view('backEnd.couponcode.edit',[
            'edit_data'=>$edit_data
        ]);
    }

    public function update(Request $request){
        $update_data           =   Couponcode::find($request->hidden_id);
        $update_data->couponcode     =    $request->couponcode;
        $update_data->expairdate     =    $request->expairdate;
        $update_data->offertype     =    $request->offertype;
        $update_data->amount     =    $request->amount;
        $update_data->buyammount     =    $request->buyammount;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Coupon Code Update successfully!');
        return redirect('admin/couponcode/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =   Couponcode::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'Coupon Code inactive successfully!');
        return redirect('admin/couponcode/manage');   
    }
    public function active(Request $request){
        $published_data         =   Couponcode::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'Coupon Code active successfully!');
        return redirect('admin/couponcode/manage');   
    }
     public function destroy(Request $request){
        $destroy_id = Couponcode::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('message', 'Coupon Code  delete successfully!');
        return redirect('/admin/couponcode/manage');         
    }
}
