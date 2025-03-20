<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoterPasskeyResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $voter;

    public function __construct($data)
    {
        $this->voter = $data;
    }

    public function build()
    {
        return $this->markdown('emails.voter-passkey-reset')
                    ->subject('Your BukSU Comelec System Passkey Has Been Reset');
    }
}
