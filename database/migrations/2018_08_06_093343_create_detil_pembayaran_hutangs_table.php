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

          $table->string('no_fb'); //foreign key
          $table->dateTime('tgl_fj');
          $table->integer('bayar');
          $table->integer('discount');
          $table->string('writeoff');
          $table->integer('hutang');
          $table->integer('total_faktur');
          $table->string('potongan_pembayaran');

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
