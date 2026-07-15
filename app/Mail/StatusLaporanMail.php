<?php

namespace App\Mail;

use App\Models\Laporan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusLaporanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $laporan;

    /**
     * Create a new message instance.
     */
    public function __construct(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Perubahan Status Laporan SIJARU')
                    ->view('emails.status-laporan');
    }
}