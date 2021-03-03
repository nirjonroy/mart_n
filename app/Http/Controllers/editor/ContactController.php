<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;
class ContactController extends Controller
{
    
	public function index(){
    	return view('backEnd.contact.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'phone'=>'required',
    		'email'=>'required',
    		'address'=>'required',
    		'status'=>'required',
    	]);
    	$store_data = new Contact();
        $store_data->phone   =  $request->phone;
        $store_data->email   =  $request->email;
        $store_data->address =  $request->address;
    	$store_data->status  = $request->status;
    	$store_data->save();
        Toastr::success('message', 'contact  add successfully!');
    	return redirect('/editor/contact-us/manage');
    }
    public function manage(){
       $show_datas = Contact::all();
        return view('backEnd.contact.manage', [
            'show_datas'=> $show_datas,
        ]);
    }

    public function edit($id){
        $edit_data = Contact::find($id);
        return view('backEnd.contact.edit', ['edit_data'=>$edit_data]);
    }

    public function update(Request $request){

        $this->validate($request,[
           'phone'=>'required',
    		'email'=>'required',
    		'address'=>'required',
    		'status'=>'required',
        ]);
        $update_data = Contact::find($request->hidden_id);
        $update_data->phone   =  $request->phone;
        $update_data->email   =  $request->email;
        $update_data->address =  $request->address;
    	$update_data->status  = $request->status;
        $update_data->save();
        Toastr::success('message', 'contact  update successfully!');
        return redirect('/editor/contact-us/manage');
    }

    public function destroy(Request $request){
        $deleteId = Contact::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'contact  delete successfully!');
        return redirect('/editor/contact-us/manage');
    }

    public function unpublished(Request $request){
        $unpublish_data = Contact::find($request->hidden_id);
        $unpublish_data->status=0;
        $unpublish_data->save();
        Toastr::success('message', 'contact  uppublished successfully!');
        return redirect('/editor/contact-us/manage');
    }

    public function published(Request $request){
        $publishId = Contact::find($request->hidden_id);
        $publishId->status=1;
        $publishId->save();
        Toastr::success('message', 'contact  uppublished successfully!');
        return redirect('/editor/contact-us/manage');
    }
}
