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
          $table->string('no_pembayaran')->unique();
          $table->dateTime('tgl_pembayaran');
          $table->dateTime('tgl_jatuh_tempo');
          $table->integer('tempo_bayar');
          $table->bigInteger('total_pembayaran');
          $table->string('posted');
          $table->string('keterangan');

          $table->unsignedInteger('supplier_id');
          $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade');

          $table->unsignedInteger('fb_id');
          $table->foreign('fb_id')
                ->references('id')->on('faktur_belis')
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
        Schema::dropIfExists('pembayaran_hutangs');
    }
}
