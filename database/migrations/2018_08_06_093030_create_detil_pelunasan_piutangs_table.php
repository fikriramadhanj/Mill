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

          $table->string('no_fj');
          $table->dateTime('tgl_fj');
          $table->integer('bayar');
          $table->integer('discount');
          $table->string('writeoff');
          $table->integer('piutang');
          $table->integer('total_faktur');

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
