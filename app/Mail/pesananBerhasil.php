<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class pesananBerhasil extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     * 
     */
    
     public $data;

    public function __construct($data)
    {
        $this->data     = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $greeting       = "Terima Kasih sudah melakukan pemesanan";
        $nama_pesanan   = $this->data['nama_pesanan'];
        $jumlah_pesanan = $this->data['jumlah_pesanan'];
        $total_harga    = $this->data['total_harga'];

        return $this->subject('Application Restaurant')
                    ->markdown('emails.pesananBerhasil')
                    ->with([
                        'greeting'          => $greeting,
                        'nama_pesanan'      => $nama_pesanan,
                        'jumlah_pesanan'    => $jumlah_pesanan,
                        'total_harga'       => $total_harga
                    ]);
    }
}
