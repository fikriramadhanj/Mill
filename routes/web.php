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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', 'MillController@showAllDataBarang');
Route::get('/supplier', 'MillController@showAllDataSupplier');
Route::get('/Pelanggan', 'MillController@showAllDataPelanggan');
Route::get('/FakturJual', 'MillController@showAllFakturJual');
Route::get('/FakturBeli', 'MillController@showAllFakturBeli');
Route::get('/FakturBeli/ShowDetilPembelian/{id}', 'MillController@showDetilPembelian');
Route::get('/FakturJual/ShowDetilPenjualan/{id}', 'MillController@showDetilPenjualan');




Route::get('/barang/formAddBarang', 'MillController@showFormAddBarang');
Route::get('/Supplier/FormAddSupplier', 'MillController@showFormAddSupplier');
Route::get('/Pelanggan/FormAddPelanggan', 'MillController@showFormAddPelanggan');
Route::get('/barang/formUpdateBarang/{id}', 'MillController@showFormUpdateBarang');
Route::get('/Supplier/FormUpdateSupplier/{id}', 'MillController@showFormUpdateSupplier');
Route::get('/Pelanggan/FormUpdatePelanggan/{id}', 'MillController@showFormUpdatePelanggan');
Route::get('/FakturJual/FormAddFakturJual', 'MillController@showFormFakturJual');
Route::get('/FakturBeli/FormAddFakturBeli', 'MillController@showFormFakturBeli');


Route::get('/FakturJual/GetFaktur', 'MillController@getFaktur');


Route::get('/barang/ProsesAddBarang', 'MillController@addBarang');
Route::get('/supplier/ProsesAddSupplier', 'MillController@addSupplier');
Route::get('/Pelanggan/ProsesAddPelanggan', 'MillController@addPelanggan');
Route::get('/FakturJual/ProsesAddFakturJual', 'MillController@addFakturJual');



Route::get('/barang/ProsesUpdateBarang/{id}', 'MillController@updateBarang');
Route::get('/Supplier/ProsesUpdateSupplier/{id}', 'MillController@updateSupplier');
Route::get('/Pelanggan/ProsesUpdatePelanggan/{id}', 'MillController@updatePelanggan');


Route::get('/barang/ProsesDeleteBarang/{id}', 'MillController@deleteBarang');
Route::get('/Supplier/ProsesDeleteSupplier/{id}', 'MillController@deleteSupplier');
Route::get('/Pelanggan/ProsesDeletePelanggan/{id}', 'MillController@deletePelanggan');
