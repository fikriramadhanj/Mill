<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakturBeli extends Model
{
      protected $table = 'faktur_belis';

      public function supplier()
     {
         return $this->hasOne('App\Supplier');
     }

     public function detilPembelian()
     {
       return $this->hasMany('App\DetilPembelian','fb_id');
     }

}
