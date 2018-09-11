<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilPembelian extends Model
{
      protected $table = 'detil_pembelians';

      

      public function barang(){

      return $this->hasOne('App\Barang');


  }
}
