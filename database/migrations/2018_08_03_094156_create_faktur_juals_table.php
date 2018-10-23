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
            $table->date('tgl_fj');
            $table->bigInteger('total_faktur');
            $table->string('keterangan');
            $table->string('status');


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
