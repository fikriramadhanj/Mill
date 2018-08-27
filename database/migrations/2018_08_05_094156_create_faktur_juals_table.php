<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakturJualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur_juals', function (Blueprint $table) {

            $table->increments('id');
            $table->string('no_fj')->unique();
            $table->dateTime('tgl_fj');
            $table->integer('tempo_bayar');
            $table->dateTime('tgl_jatuh_tempo');
            $table->string('keterangan');

            $table->unsignedInteger('pelanggan_id');
            $table->foreign('pelanggan_id')
                  ->references('id')->on('pelanggans')
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
        Schema::dropIfExists('faktur_juals');
    }
}
