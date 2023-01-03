<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',

        ]);

        foreach (['lupeteplacide@gmail.com', 'lupeteplacidearsene@gmail.com'] as $recipient) {
            Mail::to($recipient)->send(new Contact($data));
        }
        // Mail::to('lupeteplacide@gmail.com','lupeteplacidearsene@gmail.com')->send(new Contact($data));
    }
}
