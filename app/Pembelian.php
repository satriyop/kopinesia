<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';

    public function produk(){
    	return $this->hasMany('App\Produk', 'id_pembelian');
    }
    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }
}
