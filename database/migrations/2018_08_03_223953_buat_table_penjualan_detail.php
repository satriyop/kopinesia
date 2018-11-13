<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTablePenjualanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('penjualan_detail', function(Blueprint $table){
          $table->increments('id_penjualan_detail');
          $table->bigInteger('kode_produk')->unsigned();
          $table->biginteger('harga_jual')->unsigned();
          $table->integer('jumlah')->unsigned();
          $table->integer('diskon')->unsigned();
          $table->biginteger('sub_total')->unsigned();
          $table->timestamps();

        }
      );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('penjualan_detail');

    }
}
