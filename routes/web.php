<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MyBel\ProdukController;

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

Route::get('/', [ProdukController::class, 'home_index']);
Route::get('/marketplace', [ProdukController::class, 'marketplace']);


Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/proseslogin', 'LoginController@postLogin');
Route::post('/prosesloginsiswa', 'SiswaController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/logoutsiswa', 'SiswaController@logout');

// petugas
Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/dashboard', 'DashboardController@index');

    //siswa
    Route::resource('mybel', 'MyBel\ProdukController');
    //Kelas
    Route::resource('kelas', 'KelasController');

    //Petugas
    Route::resource('petugas', 'PetugasController');

    //Spp
    Route::resource('spp', 'SppController');

    //Transaksi
    Route::get('transaksi_cari', 'TransaksiController@cari');
    Route::get('transaksi_bayar/{id}', 'TransaksiController@bayar')->name('transaksi.bayar');
    Route::get('transaksi_batal/{id}', 'TransaksiController@batal')->name('transaksi.batal');
    Route::get('transaksi_pdf/{id}', 'TransaksiController@pdf')->name('transaksi.pdf');

    // Laporan
    Route::get('siswa_nunggak', 'SiswaController@siswanunggak');
    Route::get('data_guru','LaporanController@index');
    Route::get('data_guru_cetak','LaporanController@cetakguru');
    Route::get('data_siswa','LaporanController@datasiswa');
    Route::get('data_siswa_cetak','LaporanController@datasiswacetak');
    Route::view('rekap', 'admin/laporan.rekap');
    Route::get('cetak', 'LaporanController@cetak');
    Route::get('invoice', [InvoiceController::class, 'Invoice']);
});

// siswa
Route::group(['middleware'=>'auth:siswa'], function(){
    Route::get('siswa_depan','SiswaController@depan');
});



