<?php

namespace App\Http\Controllers\frontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Post;
 use Mail;
class visitorcontactController extends Controller
{
    public function visitorcontact(Request $request){
      $this->validate($request, [
         'name'=>'required',
         'contact_email'=>'required',
         'contact_phone'=>'required',
         'contact_text'=>'required',
        ]);
      $data = array(
         'name' => $request->name,
         'contact_subject' => $request->contact_subject,
         'contact_email' => $request->contact_email,
         'contact_phone' => $request->contact_phone,
         'contact_text' => $request->contact_text,
        );

        $send = Mail::send('frontEnd.emails.email', $data, function($textmsg) use ($data){
         $textmsg->from($data['contact_email']);
         $textmsg->to('zadumia441@gmail.com');
         $textmsg->subject($data['contact_text']);
        });

        Toastr::success('message', 'Thanks! your message send successfully!');
        return redirect()->back();
        }
}
