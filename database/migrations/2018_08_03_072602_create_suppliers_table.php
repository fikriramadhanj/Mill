<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_supplier');
            $table->string('nama_supplier');
            $table->string('nama_npwp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('no_telp');
            $table->string('fax');
            $table->string('kontak_person');
            $table->bigInteger('limit_hutang');
            $table->integer('tempo_bayar');
            $table->string('npwp');
            $table->string('nppkp');


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
        Schema::dropIfExists('suppliers');
    }
}
