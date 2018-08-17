<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelunasanPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasan_piutangs', function (Blueprint $table) {

          $table->increments('id');
          $table->string('no_pembayaran');
          $table->dateTime('tgl_pembayaran');
          $table->string('kode_pelanggan');
          $table->string('nama_pelanggan');
          $table->string('total_pembayaran');
          $table->string('posted');
          $table->string('keterangan');


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
        Schema::dropIfExists('pelunasan_piutangs');
    }
}
