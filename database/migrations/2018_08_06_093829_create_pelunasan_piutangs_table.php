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
          $table->string('no_pembayaran')->unique();
          $table->dateTime('tgl_pembayaran');
          $table->integer('tempo_bayar');
          $table->dateTime('tgl_jatuh_tempo');
          $table->bigInteger('total_pembayaran');
          $table->string('posted');
          $table->string('keterangan');

          $table->unsignedInteger('fj_id');
          $table->foreign('fj_id')
                ->references('id')->on('faktur_juals')
                ->onDelete('cascade');

          $table->unsignedInteger('pelanggan_id');
          $table->foreign('pelanggan_id')
                ->references('id')->on('pelanggans')
                ->onDelete('cascade');

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
