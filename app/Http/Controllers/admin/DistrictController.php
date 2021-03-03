<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\District;

class DistrictController extends Controller
{
    public function index(){
    	return view('backEnd.district.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'name'=>'required',
    		'status'=>'required',
    	]);

    	$store_data            = new District();
    	$store_data->name      = $request->name;
    	$store_data->status    = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'District add successfully!');
    	return redirect('/admin/district/manage');
    }
    public function manage(){
    	$show_data =District::orderBy('id','DESC')->get();
    	return view('backEnd.district.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =  District::find($id);
        return view('backEnd.district.edit',[
            'edit_data'=>$edit_data
        ]);
    }

    public function update(Request $request){
        $update_data           =  District::find($request->hidden_id);
        $update_data->name     =    $request->name;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'District Update successfully!');
        return redirect('admin/district/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =  District::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'District inactive successfully!');
        return redirect('admin/district/manage');   
    }
    public function active(Request $request){
        $published_data         =  District::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'District active successfully!');
        return redirect('admin/district/manage');   
    }
     public function destroy(Request $request){
        $destroy_id =District::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('message', 'District  delete successfully!');
        return redirect('/admin/district/manage');         
    }
}
