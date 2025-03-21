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
        $this->voter = $data['voter'];
    }

    public function build()
    {
        try {
            return $this->markdown('emails.voter-passkey')
                       ->subject('Your BukSU Comelec System Passkey')
                       ->withSwiftMessage(function ($message) {
                           $message->getHeaders()
                                  ->addTextHeader('X-PMTA-Custom', 'BukSU-Comelec');
                       });
        } catch (\Exception $e) {
            \Log::error('Mail build error: ' . $e->getMessage());
            throw $e;
        }
    }
}
