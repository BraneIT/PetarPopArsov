<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactFormMail;


class ContactFormController extends Controller
{
    public function sendEmail(Request $request)
    {
        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content
        ];

        $mail = new SendMail($mailData);

        // Send the email using the Mail facade.
        Mail::to('info@ooupetarpoparsov.edu.mk')->send($mail);
    }
}
