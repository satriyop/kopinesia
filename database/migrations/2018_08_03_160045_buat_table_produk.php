<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //buat table BuatTableProduk
        Schema::create('menu', function(Blueprint $table){
          $table->increments('id_produk');
          $table->string('nama_produk');
          $table->integer('harga_beli');
          $table->integer('harga_jual');
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
        //mengembalikan operasi yang dilakukan oleh method up
        Schema::drop('produk');
    }
}
