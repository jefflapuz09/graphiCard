<?php

namespace App\Mail;

// use App\Inquiries;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InquirySent extends Mailable
{
    use Queueable, SerializesModels;

    // public $inquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct(Inquiries $inquiry)
    // {
    //     $this->inquiry = $inquiry;
    // }

    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('layouts.email');
        //return $this->view('layouts.email');
    }
}
