<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paketmenu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_paket');
            $table->string('nama_paket');
            $table->string('menu_paket');
            $table->bigInteger('harga_paket');
            $table->string('gambar');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paketmenu');
    }
}
