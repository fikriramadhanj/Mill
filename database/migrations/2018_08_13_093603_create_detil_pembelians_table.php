<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_pembelians', function (Blueprint $table) {

          $table->increments('id');
          $table->string('no_fb');
          $table->string('kode_barang');
          $table->integer('qty');
          $table->integer('harga_beli');
          $table->integer('discount');
          $table->integer('sub_total');
          $table->integer('total');

          $table->unsignedInteger('barang_id');
          $table->foreign('barang_id')
                ->references('id')->on('barangs')
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
        Schema::dropIfExists('detil_pembelians');
    }
}
