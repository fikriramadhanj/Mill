<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_penjualans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('qty');
          $table->string('sub_total');

          $table->unsignedInteger('barang_id');
          $table->foreign('barang_id')
                ->references('id')->on('barangs')
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
        Schema::dropIfExists('detil_penjualans');
    }
}
