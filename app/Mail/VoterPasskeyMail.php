<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoterPasskeyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $voter;

    public function __construct($data)
    {
        $this->voter = $data;
    }

    public function build()
    {
        return $this->markdown('emails.voter-passkey')
                    ->subject('Your Passkey');
    }
}
