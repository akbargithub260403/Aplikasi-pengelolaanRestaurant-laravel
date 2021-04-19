<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarMenu extends Model
{
    protected $table    = 'daftarmenu';

    protected $fillable     = ["nama_menu","harga","gambar","keterangan"];

    
}
