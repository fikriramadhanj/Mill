<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakturJual extends Model
{

     protected $table = 'faktur_juals';

     public function pelanggan()
    {
        return $this->hasOne('App\Pelanggan');
    }

    public function detilPenjualan()
    {
      return $this->hasMany('App\DetilPenjualan','fj_id');
    }

}
