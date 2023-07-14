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
            'attachment' => 'nullable|max:20480',
        ]);
    
        // Handle file upload and attach it to the email
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentPath = $attachment->store('attachments'); // Store the attachment in a directory (e.g., 'storage/app/attachments')
    
            // Send the email with attachment
            Mail::to('celticsdevs@gmail.com')->send(new SupportEmail($validatedData, $attachmentPath));
    
            // Delete the temporary attachment file if needed
            Storage::delete($attachmentPath);
        } else {
            // Send the email without attachment
            Mail::to('celticsdevs@gmail.com')->send(new SupportEmail($validatedData));
        }

        // Redirect the user back with a success message
        return redirect()->back()->with('success', 'Sua mensagem foi enviada em breve responderemos');
    }
}
