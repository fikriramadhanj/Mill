<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilPelunasanPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_pelunasan_piutangs', function (Blueprint $table) {

          $table->integer('bayar');
          $table->integer('discount');
          $table->string('writeoff');
          $table->bigInteger('piutang');

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
        Schema::dropIfExists('detil_pelunasan_piutangs');
    }
}
