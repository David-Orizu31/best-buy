<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactUsController extends Controller
{
    public function sendmail(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
         ]);

         $input = $request->all();

         Contact::create($input);
 
         //  Send mail to admin
         \Mail::send('emails.contact', array(
             'name' => $input['name'],
             'email' => $input['email'],
             'phone' => $input['phone'],
             'address' => $input['address'],
             'subject' => $input['subject'],
             'message' => $input['message'],
         ), function($message) use ($request){
             $message->from($request->email);
             $message->to('support@thebestbuy.com', 'The Best Buy')->subject($request->get('subject'));
         });
 
         return redirect()->back()->with('success' , 'Contact Form Submit Successfully');
    }
}
