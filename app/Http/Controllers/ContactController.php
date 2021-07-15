<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store() {
        request()->validate([
            'email' => 'email|required',
            'subject' => 'required',
            'name' => 'required',
            'message' => 'required'
        ]);

        Mail::raw(request('message'), function ($message) {
            $message->from(request('email'))
                ->subject(request('subject'))
                ->to('info@example.com');
        });

        return redirect(route('contact'))->with('message', 'Email sent');
    }
}
