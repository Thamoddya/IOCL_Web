<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentRegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Institute Of Cloud Leaning Student Register Mail',
        );
    }

    public function build()
    {
        return $this->view('Emails.StudentRegisterMail')
            ->with([
                'firstName' => $this->student->firstName,
                'lastName' => $this->student->lastName,
                'ioclId' => $this->student->iocl_id,
                'email' => $this->student->email,
                'mobile_no' => $this->student->mobile_no,
            ]);
    }
}
