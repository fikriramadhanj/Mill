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
          $table->string('no_sj');
          $table->string('no_pajak');
          $table->string('keterangan');
          $table->bigInteger('total_faktur');
          $table->string('status');



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
