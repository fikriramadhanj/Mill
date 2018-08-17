<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakturBelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur_belis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('no_fb');
          $table->integer('tgl_fb');
          $table->integer('no_sj');
          $table->integer('tempo_bayar');
          $table->integer('no_pajak');
          $table->integer('uang_muka');
          $table->integer('total_bayar');
          $table->integer('discount');



          $table->string('keterangan');

          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktur_belis');
    }
}
