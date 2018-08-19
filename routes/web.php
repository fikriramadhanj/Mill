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

Route::get('/', 'HomeController@index')->name('homepage');

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
    Route::get('detail/{id}', 'FakturJualController@show')->name('show');


    Route::get('GetFaktur', 'MillController@getFaktur')->name('getFaktur');
  }
);

/* Faktur Beli */
Route::group(
  [
    'prefix' => 'FakturBeli',
    'as' => 'faktur-beli.'
  ], function () {
    Route::get('', 'MillController@showAllFakturBeli')->name('index');
    Route::get('ShowDetilPembelian/{id}', 'MillController@showDetilPembelian')->name('show');
    Route::get('FormAddFakturBeli', 'MillController@showFormFakturBeli')->name('form-create');
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

/* Supplier */

// Route::get('/barang', 'MillController@showAllDataBarang')->name('barang');
// Route::get('/supplier', 'MillController@showAllDataSupplier')->name('supplier');
// Route::get('/Pelanggan', 'MillController@showAllDataPelanggan')->name('pelanggan');
// Route::get('/FakturJual', 'MillController@showAllFakturJual')->name('faktur-jual');
// Route::get('/FakturBeli', 'MillController@showAllFakturBeli')->name('faktur-beli');
// Route::get('/FakturBeli/ShowDetilPembelian/{id}', 'MillController@showDetilPembelian')->name('faktur-beli-show');
// Route::get('/FakturJual/ShowDetilPenjualan/{id}', 'MillController@showDetilPenjualan')->name('faktur-jual-show');





// Route::get('/barang/formAddBarang', 'MillController@showFormAddBarang');
// Route::get('/Supplier/FormAddSupplier', 'MillController@showFormAddSupplier');
// Route::get('/Pelanggan/FormAddPelanggan', 'MillController@showFormAddPelanggan');
// Route::get('/barang/formUpdateBarang/{id}', 'MillController@showFormUpdateBarang');
// Route::get('/Supplier/FormUpdateSupplier/{id}', 'MillController@showFormUpdateSupplier');
// Route::get('/Pelanggan/FormUpdatePelanggan/{id}', 'MillController@showFormUpdatePelanggan');
// Route::get('/FakturJual/FormAddFakturJual', 'MillController@showFormFakturJual');
// Route::get('/FakturBeli/FormAddFakturBeli', 'MillController@showFormFakturBeli');


// Route::get('/FakturJual/GetFaktur', 'MillController@getFaktur');


// Route::get('/barang/ProsesAddBarang', 'MillController@addBarang');
// Route::get('/supplier/ProsesAddSupplier', 'MillController@addSupplier');
// Route::get('/Pelanggan/ProsesAddPelanggan', 'MillController@addPelanggan');
// Route::get('/FakturJual/ProsesAddFakturJual', 'MillController@addFakturJual');



// Route::get('/barang/ProsesUpdateBarang/{id}', 'MillController@updateBarang');
// Route::get('/Supplier/ProsesUpdateSupplier/{id}', 'MillController@updateSupplier');
// Route::get('/Pelanggan/ProsesUpdatePelanggan/{id}', 'MillController@updatePelanggan');


// Route::get('/barang/ProsesDeleteBarang/{id}', 'MillController@deleteBarang');
// Route::get('/Supplier/ProsesDeleteSupplier/{id}', 'MillController@deleteSupplier');
// Route::get('/Pelanggan/ProsesDeletePelanggan/{id}', 'MillController@deletePelanggan');
