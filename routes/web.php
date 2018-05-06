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

Route::middleware('auth')->group(function () {

  Route::get('/Lab/{id}', 'ToPdfController@lab');

  Route::get('/', 'HomeController@index')->name('beranda');
  Route::get('/absensi/{id}', 'absensiController@kehadiranPegawai');
  Route::get('/pegawai/CetakSlipGaji/{id}', 'ToPdfController@CetakSlipGaji');
  Route::get('/kehadiran', 'absensiController@kehadiran')->name('ambilKehadiran');
  Route::get('/pegawai', 'pegawaiController@pegawai')->name('dataPegawai');

  Route::post('/pegawai/edit', 'pegawaiController@editPegawai')->name('editPegawai');
  Route::post('/pegawai/tambah', 'pegawaiController@tambahPegawai')->name('tambahPegawai');
  Route::post('/pegawai/hapus', 'pegawaiController@hapusPegawai')->name('hapus');
  Route::post('/', 'absensiController@absenPegawai')->name('absen');
});

Auth::routes();
