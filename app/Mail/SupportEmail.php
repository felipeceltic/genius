<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $attachmentPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $attachmentPath = null)
    {
        $this->data = $data;
        $this->attachmentPath = $attachmentPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $mail = $this->subject($this->data['subject'])
                     ->view('support.message')
                     ->with('data', $this->data);

        if ($this->attachmentPath) {
            $mail->attach(storage_path('app/' . $this->attachmentPath));
        }

        return $mail;
    }
}
