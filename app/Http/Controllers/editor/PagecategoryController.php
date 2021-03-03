<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Pagecategory;
class PagecategoryController extends Controller
{
    public function create(){
    	return view('backEnd.pagecategory.add');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'pagename'=>'required',
            'menu_id'=>'required',
    		'status'=>'required',
    	]);

    	$store_data                    = new Pagecategory();
    	$store_data->pagename   = $request->pagename;
        $store_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->pagename)));
    	$store_data->menu_id       = $request->menu_id;
    	$store_data->status            = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Pagecategory add successfully!');
    	return redirect('/editor/pagecategory/manage');
    }
    public function manage(){
    	$show_data=Pagecategory::get();
    	return view('backEnd.pagecategory.manage',compact('show_data'));
    }
     public function edit($id){
        $edit_data = Pagecategory::find($id);
        return view('backEnd.pagecategory.edit', compact('edit_data'));
    }
      public function update(Request $request){
        $update_data                     =   Pagecategory::find($request->hidden_id);
        $update_data->pagename    =    $request->pagename;
        $update_data->slug               =   strtolower(preg_replace('/\s+/u', '-', trim($request->pagename)));
        $update_data->menu_id        =    $request->menu_id;
        $update_data->status             =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Pagecategory Update successfully!');
        return redirect('editor/pagecategory/manage');
    }

    public function inactive(Request $request){
        $inactive = Pagecategory::find($request->hidden_id);
        $inactive->status=0;
        $inactive->save();
        Toastr::success('message', 'Pagecategory active successfully!');
        return redirect('/editor/pagecategory/manage');
    }

    public function active(Request $request){
        $active = Pagecategory::find($request->hidden_id);
        $active->status=1;
        $active->save();
        Toastr::success('message', 'Pagecategory active successfully!');
        return redirect('/editor/pagecategory/manage');
    }
}
