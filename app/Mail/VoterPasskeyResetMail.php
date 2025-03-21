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
        $this->voter = $data['voter'];
    }

    public function build()
    {
        try {
            return $this->markdown('emails.voter-passkey-reset')
                       ->subject('BukSU Comelec: Your Passkey Has Been Reset')
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
