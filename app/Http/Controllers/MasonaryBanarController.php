<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\support\facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\categoriesController;
use App\Http\manufactureController;
use DB;

class MasonaryBanarController extends Controller
{
    public function index(){
    	return view('backEnd.masonary_bannar.add-masonary');
    }

     public function save_masonary(Request $request){
    $data = array();
    $data['masonary_id'] = $request->masonary_id;
    $data['masonary_link'] = $request->masonary_link;
    $data['masonary_name'] = $request->masonary_name;
    $data['publication_status'] = $request->publication_status; 
    $image = $request->file('masonary_image');
    if($image){
        $image_name = rand(1, 999);
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name. '.'. $ext;
        $upload_path = 'masonary_image/';
        $image_url = $upload_path. $image_full_name;
        $success = $image->move($upload_path, $image_full_name);
        if($success)
        {
            $data['masonary_image'] = $image_url;
            DB::table('tbl_masonary')->insert($data);
            Session::put('messsage', 'product uploaded success');
            return Redirect::to('/add-MasonaryBanar');
        }
}

        $data['masonary_image'] = '';
        DB::table('tbl_masonary')->insert($data);
            Session::put('messsage', 'product uploaded success');
            return Redirect::to('/add-MasonaryBanar');

    }
    public function all_masonary(){

        $all_MasonaryBanar_info= DB::table('tbl_masonary')->get();
        $manage_masonary = view('backEnd.masonary_bannar.all-masonary')
        ->with('all_MasonaryBanar_info', $all_MasonaryBanar_info);
        return view('backEnd.layouts.master')
        ->with('backEnd.masonary_bannar.all-masonary', $manage_masonary);
    
    }
     public function unactive_MasonaryBanar($masonary_id)
    {

     DB::table('tbl_masonary')
            ->where('masonary_id',$masonary_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-MasonaryBanar');

    }

    public function active_MasonaryBanar($masonary_id)
    {

     DB::table('tbl_masonary')
            ->where('masonary_id',$masonary_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'product unactive succesfully');
            return Redirect::to('/all-MasonaryBanar');

    }
     

     public function delete_MasonaryBanar($masonary_id)
    {

     DB::table('tbl_masonary')
            ->where('masonary_id',$masonary_id)
            ->delete();
            Session::put('message', 'delete success');
            return Redirect::to('/all-MasonaryBanar');

    }
}
