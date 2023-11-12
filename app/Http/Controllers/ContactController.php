<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
class ContactController extends Controller
{
    public function contact(){
        return view('front.contact');
    } 
    function sendContact(Request $request)
    {
        //validate
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
        $request->validate($rules);
        //Thêm mới
        $sendContact = new Mail();
        $sendContact->name = $request->input('name');
        $sendContact->email = $request->input('email');
        $sendContact->subject = $request->input('subject');
        $sendContact->message = $request->input('message');
        $sendContact->save();
        //Thông báo lỗi
        return redirect()->route('front.home');
    }
}
