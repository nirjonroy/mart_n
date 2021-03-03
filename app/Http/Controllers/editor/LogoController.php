<?php

namespace App\Http\Controllers\editor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Logo;
use File;
class LogoController extends Controller
{
     public function add(){
        return view('backEnd.logo.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'logo'=>'required',
            'faveicon'=>'required',
            'status'=>'required',
        ]);

        // logo upload
        $file = $request->file('logo');
        $name = time().'-'.$file->getClientOriginalName();
        $uploadPath = 'public/uploads/logo/';
        $file->move($uploadPath,$name);
        $fileUrl =$uploadPath.$name;

        // faveicon upload
        $file2 = $request->file('faveicon');
        $name2 = time().'-'.$file2->getClientOriginalName();
        $uploadPath2 = 'public/uploads/faveicon/';
        $file2->move($uploadPath2,$name2);
        $fileUrl2 =$uploadPath2.$name2;

        $store_data = new Logo();
        $store_data->logo = $fileUrl;
        $store_data->faveicon = $fileUrl2;
        $store_data->status = $request->status;
        $store_data->save();
        Toastr::success('message', 'Logo  add successfully!');
        return redirect('/editor/logo/manage');
    }
    public function manage(){
        $show_data = Logo::orderBy('id','DESC')->get();
        return view('backEnd.logo.manage', [
            'show_data'=> $show_data,
        ]);
    }
    public function edit($id){
        $edit_data = Logo::find($id);
        return view('backEnd.logo.edit', ['edit_data'=>$edit_data]);
    }
     public function update(Request $request){
        $this->validate($request,[
            'status'=>'required',
        ]);

        $update_data = Logo::find($request->hidden_id);
        $update_logo = $request->file('logo');
        if ($update_logo) {
           $file = $request->file('logo');
            File::delete(public_path() . 'public/uploads/logo', $update_data->logo); 
            $name = time().'-'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/logo/';
            $file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->logo;
        }

        $update_faveicon = $request->file('faveicon');
        if ($update_faveicon) {
           $file2 = $request->file('faveicon');
            File::delete(public_path() . 'public/uploads/faveicon', $update_data->faveicon); 
            $name2 = time().'-'.$file2->getClientOriginalName();
            $uploadPath2 = 'public/uploads/faveicon/';
            $file2->move($uploadPath2,$name2);
            $fileUrl2 =$uploadPath2.$name2;
        }else{
            $fileUrl2 = $update_data->faveicon;
        }

        $update_data->logo      = $fileUrl;
        $update_data->faveicon  = $fileUrl2;
        $update_data->status    = $request->status;
        $update_data->save();
        Toastr::success('message', 'Logo  update successfully!');
        return redirect('/editor/logo/manage');
    }

    public function inactive(Request $request){
        $unpublish_data = Logo::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'Logo  inactive successfully!');
        return redirect('/editor/logo/manage');
    }

    public function active(Request $request){
        $publishId = Logo::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'Logo  active successfully!');
        return redirect('/editor/logo/manage');
    }
     public function destroy(Request $request){
        $delete_data = Logo::find($request->hidden_id);
        File::delete(public_path() . 'public/uploads/logo', $delete_data->logo); 
        File::delete(public_path() . 'public/uploads/faveicon', $delete_data->faveicon); 
        $delete_data->delete();
        Toastr::success('message', 'Logo  delete successfully!');
        return redirect('/editor/logo/manage');
    }
}
