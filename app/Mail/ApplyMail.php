<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nameUser;

    public function __construct($nameUser, $emailUser)
    {
        $this->nameUser = $nameUser;
        $this->emailUser = $emailUser;
    }

    public function build(): self
    {
        return $this->from($this->emailUser)->attach('storage/' . auth()->user()->cv)->view('emails.apply');
    }
}
