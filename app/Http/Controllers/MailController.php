<?php

namespace App\Http\Controllers;

use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail($email)
    {
        $nameUser = auth()->user()->name;
        $emailUser = auth()->user()->email;
        Mail::to($email)->send(new ApplyMail($nameUser, $emailUser));
        return redirect('/')->with('message', 'CV sent successfully!');
    }
}
