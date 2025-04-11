<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotifyMail extends Mailable
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
        //
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
            subject: 'A User just registered!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(

            view: 'mails.admin-notify-mail',
            with: [
                'name' => $this->user->name,
                'course_name' => $this->user->course,
                'course_price' => $this->coursePrice,
                'payment_link' => $this->paymentLink,

            ],
        );
    }
}
