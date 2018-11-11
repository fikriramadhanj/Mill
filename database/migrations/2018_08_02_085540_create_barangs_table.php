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
            $table->date('tgl_beli');
            $table->string('kode_barang')->unique();
            $table->string('nama');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_jual');
            $table->integer('qty');
            $table->integer('min_stok');
            $table->integer('maks_stok');
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
