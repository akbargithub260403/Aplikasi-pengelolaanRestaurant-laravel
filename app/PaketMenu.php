<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketMenu extends Model
{
    protected $table = 'paketmenu';

    protected $fillable = ['kode_paket','nama_paket','nama_menu1','nama_menu2','nama_menu3','harga_paket','gambar','keterangan'];
}
