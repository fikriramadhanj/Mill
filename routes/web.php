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

Route::get('welcome', 'HomeController@index')->name('index');

/* login */
Route::group(
  [
    'prefix' => 'login',
    'as' => 'login.'
  ], function () {


    Route::get('/', 'AuthControllerController@index')->name('index');
    Route::post('create', 'BarangController@store')->name('store');
  }
);


/* Barang */
Route::group(
  [
    'prefix' => 'barang',
    'as' => 'barang.'
  ], function () {


    Route::get('', 'BarangController@index')->name('index');

    Route::get('create', 'BarangController@create')->name('create');
    Route::post('create', 'BarangController@store')->name('store');
    Route::get('edit/{id}', 'BarangController@edit')->name('edit');
    Route::post('edit/{id}', 'BarangController@update')->name('update');
    Route::post('delete/{id}', 'BarangController@destroy')->name('destroy');
    Route::get('barang-kurang', 'BarangController@laporanBarangKekurangan')->name('kurang');
    Route::get('barang-lebih', 'BarangController@laporanBarangKelebihan')->name('lebih');
    Route::get('saldo', 'BarangController@showAwalBarang')->name('saldo');
    Route::post('edit-saldo/{id}', 'BarangController@updateSaldoBarang')->name('update-saldo');
    Route::get('edit-saldo/{id}', 'BarangController@editSaldoBarang')->name('edit-saldo');



  }
);

/* Tipe Barang */
Route::group(
    [
    'prefix' => 'tipe-barang',
    'as' => 'tipe-barang.'
    ], function () {
    Route::get('', 'TipeBarangController@index')->name('index');
    Route::get('create', 'TipeBarangController@create')->name('create');
    Route::post('create', 'TipeBarangController@store')->name('store');
    Route::get('edit/{id}', 'TipeBarangController@edit')->name('edit');
    Route::post('edit/{id}', 'TipeBarangController@update')->name('update');
    Route::post('delete/{id}', 'TipeBarangController@destroy')->name('destroy');
    }
);


/* Faktur Jual */
Route::group(
  [
    'prefix' => 'faktur-jual',
    'as' => 'faktur-jual.'
  ], function () {
    Route::get('', 'FakturJualController@index')->name('index');
    Route::get('create', 'FakturJualController@create')->name('create');
    Route::post('create', 'FakturJualController@store')->name('store');
    Route::get('edit/{id}', 'FakturJualController@edit')->name('edit');
    Route::post('edit/{id}', 'FakturJualController@update')->name('update');
    Route::post('delete/{id}', 'FakturJualController@destroy')->name('destroy');



    Route::get('detail/{id}', 'FakturJualController@show')->name('show');
    Route::get('total/{id}', 'FakturJualController@getTotal')->name('total');
    Route::get('laporan', 'FakturJualController@laporanPenjualan')->name('laporan');
    Route::get('pdf/{id}', 'FakturJualController@cetakFaktur')->name('cetak');





  }
);

/* Faktur Beli */
Route::group(
  [
    'prefix' => 'faktur-beli',
    'as' => 'faktur-beli.'
  ], function () {
    Route::get('', 'FakturBeliController@index')->name('index');
    Route::get('create', 'FakturBeliController@create')->name('create');
    Route::post('create', 'FakturBeliController@store')->name('store');
    Route::get('detail/{id}', 'FakturBeliController@show')->name('show');
    Route::get('pdf/{id}', 'FakturBeliController@downloadPDF')->name('pdf');
    Route::get('laporan', 'FakturBeliController@laporanPembelian')->name('laporan');
    Route::post('delete/{id}', 'FakturBeliController@destroy')->name('destroy');


  }
);

/* PelunasanPiutang */

Route::group(
  [
      'prefix' => 'pelunasan-piutang',
      'as' => 'pelunasan-piutang.',

  ], function () {
      Route::get('','PelunasanPiutangController@index')->name('index');
      Route::get('create','PelunasanPiutangController@create')->name('create');
      Route::post('create','PelunasanPiutangController@store')->name('store');
      Route::get('detail/{id}','PelunasanPiutangController@show')->name('show');
  }
);

/* PembayaranHutang */
Route::group(
  [
      'prefix' => 'pembayaran-hutang',
      'as' => 'pembayaran-hutang.',

  ], function (){
      Route::get('','PembayaranHutangController@index')->name('index');
      Route::get('create','PembayaranHutangController@create')->name('create');
      Route::post('create','PembayaranHutangController@store')->name('store');
      Route::get('detail/{id}','PembayaranHutangController@show')->name('show');
  }
);


/* Pelanggan */
Route::group(
  [
    'prefix' => 'pelanggan',
    'as' => 'pelanggan.'
  ], function () {
    Route::get('', 'PelangganController@index')->name('index');
    Route::get('create', 'PelangganController@create')->name('create');
    Route::post('create', 'PelangganController@store')->name('store');
    Route::get('edit/{id}', 'PelangganController@edit')->name('edit');
    Route::post('edit/{id}', 'PelangganController@update')->name('update');
    Route::post('delete/{id}', 'PelangganController@destroy')->name('destroy');
  }
);

/* Supplier */
Route::group(
  [
    'prefix' => 'supplier',
    'as' => 'supplier.'
  ], function () {
    Route::get('', 'SupplierController@index')->name('index');
    Route::get('create', 'SupplierController@create')->name('create');
    Route::post('create', 'SupplierController@store')->name('store');
    Route::get('edit/{id}', 'SupplierController@edit')->name('edit');
    Route::post('edit/{id}', 'SupplierController@update')->name('update');
    Route::post('delete/{id}', 'SupplierController@destroy')->name('destroy');
  }
);

//* Mutasi Stock

Route::group(
  [
    'prefix' => 'mutasi-stok',
    'as' => 'mutasi-stok.'
  ], function () {

    Route::get('', 'MutasiStokController@index')->name('mutasi');
    Route::get('create', 'MutasiStokController@store')->name('store');
    Route::get('show', 'MutasiStokController@show')->name('show');




  }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
