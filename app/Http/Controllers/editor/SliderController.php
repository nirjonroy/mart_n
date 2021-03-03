<?php

namespace App\Http\Controllers\editor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Slider;
use File;
class SliderController extends Controller
{
    public function add(){
    	return view('backEnd.slider.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'image'=>'required',
            'link'=>'required',
            'status'=>'required',
    	]);

    	// image upload
    	$file = $request->file('image');
    	$name = time().'-'.$file->getClientOriginalName();
    	$uploadPath = 'public/uploads/slider/';
    	$file->move($uploadPath,$name);
    	$fileUrl =$uploadPath.$name;

    	$store_data = new Slider();
    	$store_data->image = $fileUrl;
        $store_data->link = $request->link;
        $store_data->status = $request->status;
    	$store_data->save();
        Toastr::success('message', 'slider  add successfully!');
    	return redirect('/editor/slider/manage');
    }
    public function manage(){
    	$show_data = Slider::all();
        return view('backEnd.slider.manage', [
            'show_data'=> $show_data,
        ]);
    }
    public function edit($id){
        $edit_data = Slider::find($id);
        return view('backEnd.slider.edit', ['edit_data'=>$edit_data]);
    }
     public function update(Request $request){
        $this->validate($request,[
            'status'=>'required',
            'link'=>'required',
        ]);

        $update_data = Slider::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/slider', $update_data->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/slider/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }

        $update_data->image = $fileUrl;
        $update_data->link = $request->link;
        $update_data->status = $request->status;
        $update_data->save();
        Toastr::success('message', 'slider  update successfully!');
        return redirect('/editor/slider/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Slider::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'slider  inactive successfully!');
        return redirect('/editor/slider/manage');
    }

    public function active(Request $request){
        $publishId = Slider::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'slider  active successfully!');
        return redirect('/editor/slider/manage');
    }
     public function destroy(Request $request){
        $deleteId = Slider::find($request->hidden_id);
         File::delete(public_path() . 'public/uploads/slider', $deleteId->image);
        $deleteId->delete();
        Toastr::success('message', 'slider  delete successfully!');
        return redirect('/editor/slider/manage');
    }
}
