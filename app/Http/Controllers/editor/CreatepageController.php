<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Createpage;
use App\Pagecategory;
use DB;
class CreatepageController extends Controller
{
    public function create(){
    	$pagecategory = Pagecategory::where('status',1)->get();
    	return view('backEnd.createpage.create',compact('pagecategory'));
    }
    public function store(Request $request){
    	$this->validate($request,[
            'page_id'=>'required',
            'text'=>'required',
    		'status'=>'required',
    	]);

    	$store_data                    = new Createpage();
    	$store_data->title             = $request->title;
        $store_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
    	$store_data->page_id           = $request->page_id;
    	$store_data->text       	   = $request->text;
    	$store_data->status            = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Content add successfully!');
    	return redirect('/editor/createpage/manage');
    }
    public function manage(){
    	$show_data=Createpage::get();
    	 $show_data = DB::table('createpages')
            ->join('pagecategories', 'createpages.page_id', '=', 'pagecategories.id')
            ->select('createpages.*', 'pagecategories.pagename')
            ->orderBy('id','DESC')
            ->get();
    	return view('backEnd.createpage.manage',compact('show_data'));
    }
     public function edit($id){
        $pagecategory = Pagecategory::where('status',1)->get();
        $edit_data = Createpage::find($id);
        return view('backEnd.createpage.edit', compact('edit_data','pagecategory'));
    }
      public function update(Request $request){
        $update_data                     =   Createpage::find($request->hidden_id);
        $update_data->title              =    $request->title;
        $update_data->slug               =   strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $update_data->page_id            =    $request->page_id;
        $update_data->text               =    $request->text;
        $update_data->status             =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Content Update successfully!');
        return redirect('editor/createpage/manage');
    }

    public function inactive(Request $request){
        $inactive = Createpage::find($request->hidden_id);
        $inactive->status=0;
        $inactive->save();
        Toastr::success('message', 'Content active successfully!');
        return redirect('/editor/createpage/manage');
    }

    public function active(Request $request){
        $active = Createpage::find($request->hidden_id);
        $active->status=1;
        $active->save();
        Toastr::success('message', 'Content active successfully!');
        return redirect('/editor/createpage/manage');
    }
}
