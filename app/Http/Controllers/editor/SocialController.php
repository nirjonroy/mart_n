<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Socialmedia;
class SocialController extends Controller
{
    public function index(){
    	return view('backEnd.socialmedia.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'icon'=>'required',
    		'link'=>'required',
    		'status'=>'required',
    	]);
    	$store_data = new Socialmedia();
        $store_data->name =  $request->name;
        $store_data->icon =  $request->icon;
        $store_data->link =  $request->link;
    	$store_data->status  = $request->status;
    	$store_data->save();
        Toastr::success('message', 'Social media add successfully!');
    	return redirect('/editor/social-media/manage');
    }
    public function manage(){
       $show_datas = Socialmedia::all();
        return view('backEnd.socialmedia.manage', [
            'show_datas'=> $show_datas,
        ]);
    }

    public function edit($id){
        $edit_data = Socialmedia::find($id);
        return view('backEnd.socialmedia.edit', ['edit_data'=>$edit_data]);
    }

    public function update(Request $request){

        $this->validate($request,[
    		'icon'=>'required',
    		'status'=>'required',
        ]);

        $update_data = Socialmedia::find($request->hidden_id);
        $update_data->name =  $request->name;
        $update_data->icon =  $request->icon;
        $update_data->link =  $request->link;
    	$update_data->status  = $request->status;
        $update_data->save();
        Toastr::success('message', 'Social media update successfully!');
        return redirect('/editor/social-media/manage');
    }

    public function destroy(Request $request){
        $deleteId = Socialmedia::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'Social media delete successfully!');
        return redirect('/editor/social-media/manage');
    }

    public function unpublished(Request $request){
        $unpublish_data = Socialmedia::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Social media uppublished successfully!');
        return redirect('/editor/social-media/manage');
    }

    public function published(Request $request){
        $publishId = Socialmedia::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Social media uppublished successfully!');
        return redirect('/editor/social-media/manage');
    }
}
