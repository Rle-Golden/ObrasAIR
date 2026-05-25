<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $emailAddress;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->emailAddress = $email;
    }

    public function build()
    {
        return $this->subject('Restablecer contraseña - ObrasAIR')
            ->view('emails.reset_password')
            ->with([
                'token' => $this->token,
                'email' => $this->emailAddress,
            ]);
    }
}
