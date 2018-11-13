<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populasi nama nama Menu
        DB::table('menu')->insert(array(
          ['nama_produk' => 'Gayo','harga_jual' => '12000'],
          ['nama_produk' => 'Bali','harga_jual' => '13000'],
          ['nama_produk' => 'Mamasa','harga_jual' => '14000'],
          ['nama_produk' => 'Rwanda','harga_jual' => '18000']
        ));
    }
}
