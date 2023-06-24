<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use App\Models\Admin;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $admin;

    /**
     * Create a new message instance.
     */
    public function __construct(Admin $admin)
    {
        $this->admin=$admin;
    }

    public function build()
    {
        return $this->subject('Verify Your Email')->markdown('emails.verify-email')
        ->with([
        'admin' => $this->admin,
        'verificationUrl' => $this->verificationUrl(),
        ]);

        }

        protected function verificationUrl()
{
    return URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'id' => $this->admin->id,
            'hash' => sha1($this->admin->getEmailForVerification())
            ]
      
    );
}
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
