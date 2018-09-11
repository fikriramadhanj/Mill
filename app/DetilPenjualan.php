<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilPenjualan extends Model
{
  protected $table = 'detil_penjualans';

  public function barang(){

      return $this->hasOne('App\Barang');


  }

}
