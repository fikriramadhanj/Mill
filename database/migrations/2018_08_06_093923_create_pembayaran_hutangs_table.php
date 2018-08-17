<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranHutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_hutangs', function (Blueprint $table) {

          $table->increments('id');
          $table->integer('no_pembayaran');
          $table->integer('tgl_pembayaran');
          $table->dateTime('tgl_jatuh_tempo');
          $table->string('kode_supplier');
          $table->string('nama_supplier');
          $table->string('nama_pelanggan');
          $table->integer('bayar_tunai');
          $table->integer('bayar_transfer');
          $table->integer('bayar_giro');
          $table->integer('no_giro');
          $table->string('nama_bank');
          $table->integer('total_pembayaran');
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
        Schema::dropIfExists('pembayaran_hutangs');
    }
}
