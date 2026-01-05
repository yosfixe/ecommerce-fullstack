<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailServer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $pdf)
    {
        $this->order = $order;
        $this->pdf = $pdf;
    }
    
    public function build()
    {
        return $this->subject('Your Order Invoice')
        ->markdown('mail.mail-server')
        ->with(['order'=>$this->order])
        ->attachData($this->pdf, 'order-'.$this->order->id.'.pdf', [
        'mime' => 'application/pdf',
        ]);

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Server',
        );
    }


    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.mail-server',
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
