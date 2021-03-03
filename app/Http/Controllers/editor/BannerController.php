<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Banner;
use App\Category;
use File;
class BannerController extends Controller
{
    public function add(){
    	$category = Category::where('status',1)->get();
    	return view('backEnd.banner.add',compact('category'));
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
    	$uploadPath = 'public/uploads/banner/';
    	$file->move($uploadPath,$name);
    	$fileUrl =$uploadPath.$name;

    	$store_data = new Banner();
    	$store_data->image = $fileUrl;
        $store_data->area = $request->area;
        $store_data->posttype = $request->posttype;
        $store_data->frontpage = $request->frontpage;
        $store_data->link = $request->link;
        $store_data->text = $request->text;
        $store_data->status = $request->status;
    	$store_data->save();
        Toastr::success('message', 'Banner add successfully!');
    	return redirect('/editor/banner/manage');
    }
    public function manage(){
    	$show_data = Banner::orderBy('id','DESC')->get();
        return view('backEnd.banner.manage',compact('show_data'));
    }
    public function edit($id){
    	$category = Category::where('status',1)->get();
        $edit_data = Banner::find($id);
        return view('backEnd.banner.edit',compact('category','edit_data'));
    }
     public function update(Request $request){
        $this->validate($request,[
            'status'=>'required',
        ]);
        $update_data = Banner::find($request->hidden_id);
        $update_image = $request->file('image');
        if ($update_image) {
           $file = $request->file('image');
            File::delete(public_path() . 'public/uploads/banner', $update_data->image); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/banner/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }

        $update_data->image = $fileUrl;
        $update_data->area = $request->area;
        $update_data->posttype = $request->posttype;
        $update_data->link = $request->link;
        $update_data->text = $request->text;
        $update_data->frontpage = $request->frontpage;
        $update_data->status = $request->status;
        $update_data->save();
        Toastr::success('message', 'Banner update successfully!');
        return redirect('/editor/banner/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Banner::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Banner inactive successfully!');
        return redirect('/editor/banner/manage');
    }

    public function active(Request $request){
        $publishId = Banner::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Banner active successfully!');
        return redirect('/editor/banner/manage');
    }
     public function destroy(Request $request){
        $deleteId = Banner::find($request->hidden_id);
         File::delete(public_path() . 'public/uploads/banner', $deleteId->image);
        $deleteId->delete();
        Toastr::success('message', 'Banner delete successfully!');
        return redirect('/editor/banner/manage');
    }
     public function bulkoption(Request $request){
        $selleroption = $request->selectptions;
        if($selleroption==0){
           $banners = $request->banners;
            foreach($banners as $banner){
                $banner         =   Banner::find($banner);
                $banner->status =   0;
                $banner->save();
            } 
            Toastr::success('message', 'Banner inactive successfully!');
            return redirect('editor/banner/manage');
        }elseif($selleroption==1){
           $banners = $request->banners;
            foreach($banners as $banner){
                $banner         =   Banner::find($banner);
                $banner->status =   1;
                $banner->save();
                
            } 
            Toastr::success('message', 'Banner active successfully!');
            return redirect('editor/banner/manage');
        } 
    }
}
