<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateGenerated extends Mailable
{
    use Queueable, SerializesModels;

    protected $certificate_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($certificate_details)
    {
       $this->certificate_details=$certificate_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->certificate_details;

        return $this->view('email.certificateGenerated', compact('details'));
    }
}
