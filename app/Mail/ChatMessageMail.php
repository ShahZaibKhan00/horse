<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChatMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $chatMessage;
    public $receiver;
    public $senderName;

    /**
     * Create a new message instance.
     */
    public function __construct($chatMessage, $receiver, $senderName = 'Someone')
    {
        $this->chatMessage = $chatMessage;
        $this->receiver = $receiver;
        $this->senderName = $senderName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Message from ' . $this->senderName,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.chat_notification',
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
