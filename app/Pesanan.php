<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table        = 'pesanan';

    protected $fillable     = ["kode_pesanan","nama_pemesan","nama_pesanan","harga_pesanan","jumlah_pesanan","email_pemesan"];
}
