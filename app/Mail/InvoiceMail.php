<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Mail;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Bill $bill,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Factura Renfix',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.bill',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
