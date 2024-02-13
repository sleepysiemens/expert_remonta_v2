<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class FormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $props;

    /**
     * Create a new message instance.
     */
    public function __construct($props)
    {
        $this->props = $props;
        //dd($this->props);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            subject: 'ExpertRemonta ' . env('APP_CITY') . ' - ' . $this->props->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.form',
            /*with: [
                'props' => $this->props,
            ],*/
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        /*return isset($props->file) ? [
            Attachment::fromStorage($props->file),
        ] : [];*/
        return [];
    }
}
