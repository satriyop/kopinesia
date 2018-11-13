<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTablePenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('penjualan', function(Blueprint $table){
          $table->increments('id_penjualan');
          $table->bigInteger('kode_member')->unsigned();
          $table->integer('total_item')->unsigned();
          $table->biginteger('total_harga')->unsigned();
          $table->integer('diskon')->unsigned();
          $table->biginteger('bayar')->unsigned();
          $table->biginteger('diterima')->unsigned();
          $table->integer('id_user')->unsigned();
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
        Schema::drop('penjualan');

    }
}
