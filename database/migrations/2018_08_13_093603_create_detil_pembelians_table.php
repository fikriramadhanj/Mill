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
          $table->integer('qty');
          $table->bigInteger('sub_total');

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
