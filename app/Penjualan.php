<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table ='penjualan';
    protected $primaryKey = 'id_penjualan';

    public function produk(){
    	return $this->hasMany('App\Produk', 'id_penjualan');
    }
}
