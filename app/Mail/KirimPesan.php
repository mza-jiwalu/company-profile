<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimPesan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nama;
    public $email;
    public $phone;
    public $pesan;
    public function __construct($nama, $email, $phone, $pesan)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->phone = $phone;
        $this->pesan = $pesan;
    }   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pesan dari pengunjung')->view('viewMailPesan');
    }
}
