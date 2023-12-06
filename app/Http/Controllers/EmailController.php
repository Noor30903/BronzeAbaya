<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // create a function to load a form to send email
    public function loadForm(){
        return view("form");
    }
    public function send(Request $request){
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'body' => 'required',
            'footer' => 'required',
        ]);

        try {
            // send email
        $mailData = [
            'title' => $request->title,
            'body' => $request->body,
            'footer' => $request->footer,
        ];

        Mail::to($request->email)->send(new SendEmail($mailData));
        return redirect('/form')->with('success','email was sent successfully!');
        } catch (\Exception $e) {
            return redirect('/form')->with('error', $e->getMessage());
        }
    }
}

