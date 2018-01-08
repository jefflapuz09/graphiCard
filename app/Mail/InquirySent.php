<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Inquiries;
use App\CompanyInfo;

class InquirySent extends Mailable
{
    use Queueable, SerializesModels;

    public $inquirerData;

    public function __construct(Inquiries $inquiry, CompanyInfo $compInfo)
    {
        $this->inquirerData = $inquiry; 
        $this->compInfo = $compInfo; 
    }

    public function build()
    {
        return $this->from('eyemcoronado@gmail.com', 'Graphicard')
                    ->subject('Graphicard Inquiry')
                    ->markdown('email.inquirySent')
                    ->with('mailData', $this->inquirerData)
                    ->with('companyInfo', $this->compInfo);
                }
}
