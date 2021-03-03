<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class ChangePassController extends Controller
{
     public function index(){
        return view('backEnd.setting.changepass');
    }
    public function updated(Request $request){
        $this->validate($request, [
            'old_password'=>'required',
            'new_password'=>'required',
            'password_confirmation' => 'required_with:new_password|same:new_password|'
        ]);

        $user = User::find(Auth::id());
        $hashPass = $user->password;

        if (Hash::check($request->old_password, $hashPass)) {

            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            Toastr::success('message', 'Password changed successfully!');
            return back();
        }else{
            Toastr::error('message', 'Old password not match!');
            return back();
        }

    }
}
