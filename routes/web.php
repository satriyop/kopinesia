<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'], function(){
   Route::get('user/profil', 'UserController@profil')->name('user.profil');
   Route::patch('user/{id}/change', 'UserController@changeProfil');

});


Route::group(['middleware' => ['web', 'cekuser:1']], function(){
	Route::resource('kategori', 'KategoriController');
	Route::get('datakategori', 'KategoriController@listData')->name('kategori.data');

	Route::resource('produk', 'ProdukController');
	Route::get('dataproduk', 'ProdukController@listData')->name('produk.data');


	Route::resource('supplier', 'SupplierController');
	Route::get('datasupplier', 'SupplierController@listData')->name('supplier.data');

	Route::get('member/data', 'MemberController@listData')->name('member.data');
	Route::post('member/cetak', 'MemberController@printCard');
	Route::resource('member', 'MemberController');
	

	Route::get('pembelian/data', 'PembelianController@listData')->name('pembelian.data');
	Route::resource('pembelian', 'PembelianController');

	Route::get('pembelian_detail/data', 'PembelianController@detailData')->name('pembelian_detail.data');
	Route::get('pembelian_detail/loadform/{diskon}/{total}', 'PembelianDetailController@loadForm');

	Route::get('pembelian/{id}/lihat', 'PembelianController@show');
	Route::get('pembelian/{id}/tambah', 'PembelianController@create');   
  	
  	Route::resource('pembelian_detail', 'PembelianDetailController');  

	Route::get('penjualan/data', 'PenjualanController@listData')->name('penjualan.data');
	Route::resource('penjualan', 'PenjualanController');

	Route::get('laporan', 'LaporanController@index')->name('laporan.index');
	Route::post('laporan', 'LaporanController@refresh')->name('laporan.refresh');
	Route::get('laporan/data/{awal}/{akhir}', 'LaporanController@listData')->name('laporan.data'); 
	Route::get('laporan/pdf/{awal}/{akhir}', 'LaporanController@exportPDF');

	Route::resource('setting', 'SettingController');



});






