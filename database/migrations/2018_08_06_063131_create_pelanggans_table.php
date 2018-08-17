<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->integer('no_telp');
            $table->string('fax');
            $table->integer('kontak_person');
            $table->integer('limit_hutang');
            $table->integer('default_tempo');
            $table->integer('npwp');
            $table->integer('nppkp');


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
        Schema::dropIfExists('pelanggans');
    }
}
