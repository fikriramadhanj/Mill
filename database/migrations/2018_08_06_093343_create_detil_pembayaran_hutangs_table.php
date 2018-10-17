<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilPembayaranHutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_pembayaran_hutangs', function (Blueprint $table) {

          $table->integer('bayar');
          $table->integer('discount');
          $table->bigInteger('hutang');
          $table->bigInteger('bayar_tunai');
          $table->bigInteger('bayar_transfer');
          $table->integer('bayar_giro');
          $table->string('no_giro');
          $table->string('nama_bank');
          $table->string('potongan_pembayaran');

          $table->unsignedInteger('fb_id');
          $table->foreign('fb_id')
                ->references('id')->on('faktur_belis')
                ->onDelete('cascade');

          $table->unsignedInteger('pembayaran_id');
          $table->foreign('pembayaran_id')
                ->references('id')->on('pembayaran_hutangs')
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
        Schema::dropIfExists('detil_pembayaran_hutangs');
    }
}
