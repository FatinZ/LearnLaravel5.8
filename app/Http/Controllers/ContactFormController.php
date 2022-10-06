<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create() {
        return view('contact.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('test@email.com')->send(new ContactFormMail($data));

        // Would be nicer to have a Thank You page
        return redirect('/contact')->with('message', ' Thank you for your message. We will be in touch!');
    }
}
