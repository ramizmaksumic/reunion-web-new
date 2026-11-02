<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ProjectInquiryMail extends Mailable
{
    public function __construct(public string $service, public array $answers, public array $contact, public string $submittedAt) {}

    public function build(): static
    {
        return $this->subject('Novi upit za ponudu — '.$this->service)
            ->replyTo($this->contact['email'], $this->contact['name'])
            ->view('mail.project-inquiry');
    }
}
