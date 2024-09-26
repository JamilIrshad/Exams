<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class purchase extends Mailable
{
    use Queueable, SerializesModels;

    public $orderId;

    public $exam;

    /**
     * Create a new message instance.
     */
    public function __construct($orderId, $exam)
    {
        $this->orderId = $orderId;
        $this->exam = $exam;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jamil.muhammad@tecspine.com', 'Jamil Irshad'),
            subject: 'Purchase from Exams',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email',
            with: ['orderId' => $this->orderId, 'exam' => $this->exam],
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
