<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Advertisment;
use File;

class advertismentController extends Controller
{
    
    public function add(){
    	return view('backEnd.advertisment.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'image'=>'required',
    		'area'=>'required',
            'link'=>'required',
            'status'=>'required',
    	]);

    	// image upload
    	$file = $request->file('image');
    	$name = time().'-'.$file->getClientOriginalName();
    	$uploadPath = 'public/uploads/advertisment/';
    	$file->move($uploadPath,$name);
    	$fileUrl =$uploadPath.$name;

    	$store_data = new Advertisment();
    	$store_data->image = $fileUrl;
    	$store_data->area = $request->area;
        $store_data->link = $request->link;
        $store_data->status = $request->status;
    	$store_data->save();
        Toastr::success('message', 'Advertisment  add successfully!');
    	return redirect('admin/advertisment/manage');
    }
    public function manage(){
    	$show_data = Advertisment::orderBy('id','DESC')->get();
        return view('backEnd.advertisment.manage', [
            'show_data'=> $show_data,
        ]);
    }
    public function edit($id){
        $edit_data = Advertisment::find($id);
        return view('backEnd.advertisment.edit', ['edit_data'=>$edit_data]);
    }
     public function update(Request $request){
        $this->validate($request,[
            'status'=>'required',
        ]);

        $update_data = Advertisment::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/slider', $update_data->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/advertisment/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }

        $update_data->image = $fileUrl;
        $update_data->area = $request->area;
        $update_data->link = $request->link;
        $update_data->status = $request->status;
        $update_data->save();
        Toastr::success('message', 'Advertisment  update successfully!');
        return redirect('admin/advertisment/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Advertisment::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Advertisment  inactive successfully!');
        return redirect('admin/advertisment/manage');
    }

    public function active(Request $request){
        $publishId = Advertisment::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Advertisment  active successfully!');
        return redirect('admin/advertisment/manage');
    }
     public function destroy(Request $request){
        $deleteId = Advertisment::find($request->hidden_id);
         File::delete(public_path() . 'public/uploads/slider', $deleteId->image);
        $deleteId->delete();
        Toastr::success('message', 'Advertisment  delete successfully!');
        return redirect('admin/advertisment/manage');
    }
}
