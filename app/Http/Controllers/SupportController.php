<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportEmail;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function create(){
        return view('support.index');
    }

    public function sendEmail(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    
        // Send the email without attachment
        Mail::to('celticsdevs@gmail.com')->send(new SupportEmail($validatedData));

        // Redirect the user back with a success message
        return redirect()->back()->with('alert', 'Sua mensagem foi enviada em breve responderemos');
    }
}
