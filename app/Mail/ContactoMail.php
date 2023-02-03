<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\{Content, Address};
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $asunto;
    public string $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $datos)
    {
        $this->asunto=$datos['asunto'];
        $this->email=$datos['email'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email, auth()->user()->nombre),
            subject: $this->asunto,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'correos.contacto',
            //view: 'correos.contacto',
            with:[
                'asunto'=>$this->asunto,
                'email'=>$this->email
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
