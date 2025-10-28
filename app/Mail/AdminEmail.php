<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'New Booking Details';

    public $logo;
    public $amount;
    public $code;
    public $number;
    public $email;
    public $address;
    public $footerText;
    public $dataquery;

    public function __construct($logo, $amount, $code, $number, $email, $address, $footerText, $dataquery)
    {
        $this->logo = $logo;
        $this->amount = $amount;
        $this->code = $code;
        $this->number = $number;
        $this->email = $email;
        $this->address = $address;
        $this->footerText = $footerText;
        $this->dataquery = $dataquery;
    }

    public function build()
    {
        return $this->view('emails.admin_email');
    }
}
