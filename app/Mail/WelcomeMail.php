<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $coursePrice;
    public $paymentLink;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $coursePrice, $paymentLink)
    {
        $this->user = $user;
        $this->coursePrice = $coursePrice;
        $this->paymentLink = $paymentLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to SakarlTech Training',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.welcome-mail',
            with: [
                'name' => $this->user->name,
                'course_name' => $this->user->course,
                'course_price' => $this->coursePrice,
                'payment_link' => $this->paymentLink,
                'support_email' => 'admin@sakarltech.com',
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
