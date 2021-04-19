<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class pesananPaket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $greeting       = "Terima Kasih sudah melakukan pemesanan";
        $nama_paket     = $this->data['nama_paket'];
        $nama_pesanan   = $this->data['nama_pesanan'];
        $total          = $this->data['total_harga'];
        $jumlah_pesanan = $this->data['jumlah_pesanan'];

        return $this->subject('Application Restauran')
                    ->markdown('emails.pesananPaketBerhasil')
                    ->with([
                        'greeting'          => $greeting,
                        'nama_paket'        => $nama_paket,
                        'nama_pesanan'      => $nama_pesanan,
                        'total'             => $total,
                        'jumlah_pesanan'    => $jumlah_pesanan
                    ]);
    }
}
