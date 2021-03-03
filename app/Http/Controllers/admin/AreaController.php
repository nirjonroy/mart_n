<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\District;
use App\Area;
use DB;

class AreaController extends Controller
{
     public function index(){
     	$districts = District::where('status',1)->orderBy('id','DESC')->get();
    	return view('backEnd.area.add',compact('districts'));
    }
    public function store(Request $request){
    	$this->validate($request,[
            'district_id'=>'required',
            'area'=>'required',
            'shippingfee'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new Area();
    	$store_data->district_id      = $request->district_id;
    	$store_data->area      = $request->area;
        $store_data->shippingfee      = $request->shippingfee;
    	$store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Area add successfully!');
    	return redirect('/admin/area/manage');
    }
    public function manage(){
    	 $show_data = DB::table('areas')
            ->join('districts', 'districts.id', '=', 'areas.district_id')
            ->select('areas.*', 'districts.name')
            ->orderBy('id','DESC')
            ->get();

    	return view('backEnd.area.manage',compact('show_data'));
    }
    public function edit($id){
    	$districts = District::where('status',1)->orderBy('id','DESC')->get();
        $edit_data =  Area::find($id);
        return view('backEnd.area.edit',compact('edit_data','districts'));
    }

    public function update(Request $request){
        $update_data           =  Area::find($request->hidden_id);
        $update_data->district_id     =    $request->district_id;
        $update_data->area     =    $request->area;
        $update_data->shippingfee     =    $request->shippingfee;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Area Update successfully!');
        return redirect('admin/area/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =  Area::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'Area inactive successfully!');
        return redirect('admin/area/manage');   
    }
    public function active(Request $request){
        $published_data         =  Area::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'Area active successfully!');
        return redirect('admin/area/manage');   
    }
     public function destroy(Request $request){
        $destroy_id =Area::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('message', 'Area  delete successfully!');
        return redirect('/admin/area/manage');         
    }
}
