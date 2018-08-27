<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('tgl_beli');
            $table->string('kode_barang');
            $table->string('nama');
            $table->integer('berat');
            $table->decimal('harga_beli',10,3);
            $table->integer('harga_jual1');
            $table->integer('harga_jual2');
            $table->integer('harga_jual3');
            $table->integer('harga_jual4');
            $table->integer('harga_jual5');
            $table->integer('qty');
          //  $table->integer('qty_minimum');

            $table->unsignedInteger('tipe_id');
            $table->foreign('tipe_id')
                  ->references('id')->on('tipe_barangs')
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
        Schema::dropIfExists('barangs');
    }
}
