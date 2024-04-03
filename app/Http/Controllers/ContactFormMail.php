<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;


class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 
     * Create a new message instance
     * 
     * 
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * 
     * Build the message
     * 
     * @return $this
     * 
     */
    public function build(){
         
    }
}
