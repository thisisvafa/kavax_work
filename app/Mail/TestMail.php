<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {;
        $this->details = $details;
        $this->name = 'Kavax';
        $this->message_text = 'this is Kavax';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test Mail from Tawsif')->view('email.TestEmail')->with(['name'=>$this->name,'message_text'=>$this->message_text]);
    }
}
