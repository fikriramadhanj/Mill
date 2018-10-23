<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FakturBeli extends Model
{
      protected $table = 'faktur_belis';

      public function supplier()
     {
         return $this->hasOne('App\Models\Supplier');
     }

     public function detilPembelian()
     {
       return $this->hasMany('App\Models\DetilPembelian','fb_id');
     }

}
