<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Offer;
class OfferController extends Controller
{
    public function index(){
    	return view('backEnd.offer.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'location'=>'required',
            'description'=>'required',
            'amount'=>'required',
    		'buyammount'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Offer();
    	$store_data->location      = $request->location;
    	$store_data->description      = $request->description;
    	$store_data->amount      = $request->amount;
    	$store_data->buyammount      = $request->buyammount;
    	$store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Offer add successfully!');
    	return redirect('/admin/offer/manage');
    }
    public function manage(){
    	$show_data = Offer::all();
    	return view('backEnd.offer.manage',compact('show_data'));
    }
    public function edit($id){
        $edit_data =   Offer::find($id);
        return view('backEnd.offer.edit',compact('edit_data'));
    }

    public function update(Request $request){
        $update_data           =   Offer::find($request->hidden_id);
        $update_data->location =    $request->location;
        $update_data->description=    $request->description;
        $update_data->amount     =    $request->amount;
        $update_data->buyammount =    $request->buyammount;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Offer Update successfully!');
        return redirect('admin/offer/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =   Offer::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'Offer inactive successfully!');
        return redirect('admin/offer/manage');   
    }
    public function active(Request $request){
        $published_data         =   Offer::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'Offer active successfully!');
        return redirect('admin/offer/manage');   
    }
     public function destroy(Request $request){
        $destroy_id = Offer::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('message', 'Offer delete successfully!');
        return redirect('/admin/offer/manage');         
    }
}
