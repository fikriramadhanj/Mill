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
          $table->string('no_fb')->unique();
          $table->dateTime('tgl_fb');
          $table->dateTime('tgl_jatuh_tempo');
          $table->string('no_sj');
          $table->integer('tempo_bayar');
          $table->string('no_pajak');
          $table->bigInteger('uang_muka');
          $table->string('keterangan');

          $table->unsignedInteger('supplier_id');
          $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
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
        Schema::dropIfExists('faktur_belis');
    }
}
