<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Booking Confirmation';

    public $logo;
    public $amount;
    public $code;
    public $number;
    public $email;
    public $address;
    public $footerText;
    public $BNcode;
    public $dataquery;

    public function __construct($logo, $amount, $code, $number, $email, $address, $footerText, $BNcode, $dataquery)
    {
        $this->logo = $logo;
        $this->amount = $amount;
        $this->code = $code;
        $this->number = $number;
        $this->email = $email;
        $this->address = $address;
        $this->footerText = $footerText;
        $this->BNcode = $BNcode;
        $this->dataquery = $dataquery;
    }

    public function build()
    {
        return $this->view('emails.new_booking');
    }

}
