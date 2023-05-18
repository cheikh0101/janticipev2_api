<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMessageEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $objet, $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objet, $email, $message)
    {
        $this->objet = $objet;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.send-contact-message-email', ['email' => $this->email, 'objet' => $this->objet, 'message' => $this->message])->subject("Nouveau message depuis le formulaire de contact");
    }
}
