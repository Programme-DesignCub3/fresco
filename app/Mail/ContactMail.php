<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $now = now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');

        return new Envelope(
            from: new Address('noreply@fresco.co.id', 'noreply fresco'),
            subject: 'Fresco Contact Notification | ' . $now
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $htmlString = '<h1>Seseorang telah mengisi form kontak!</h1>';
        $htmlString .= '<p>Nama: ' . $this->data['name'] . '</p>';
        $htmlString .= '<p>Email: ' . $this->data['email'] . '</p>';
        $htmlString .= '<p>Subject: ' . $this->data['subject'] . '</p>';
        $htmlString .= '<p>Pesan: ' . $this->data['message'] . '</p>';

        return new Content(
            htmlString: $htmlString
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
