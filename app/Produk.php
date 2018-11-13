<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //definisi table yang digunakan pada model
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public function kategori(){
       return $this->belongsTo('App\Kategori');
    }
    public function supplier(){
       return $this->belongsTo('App\Supplier');
    }


    public function pembelian(){
       return $this->belongsTo('App\Pembelian');
    }

    public function penjualan(){
       return $this->belongsTo('App\Penjualan');
    }
}
