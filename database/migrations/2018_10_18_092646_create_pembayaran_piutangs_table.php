<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_piutangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pembayaran')->unique();
            $table->date('tgl_pembayaran');
            $table->date('tgl_jatuh_tempo');
            $table->integer('tempo_bayar');
            $table->bigInteger('total_pembayaran');
            $table->bigInteger('sisa_hutang');

            $table->unsignedInteger('pelanggan_id');
            $table->foreign('pelanggan_id')
                  ->references('id')->on('pelanggans')
                  ->onDelete('cascade');


            $table->unsignedInteger('fj_id');
            $table->foreign('fj_id')
                  ->references('id')->on('faktur_juals')
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
        Schema::dropIfExists('pembayaran_piutangs');
    }
}
