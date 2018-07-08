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

Auth::routes();



Route::prefix('admin')->group(function (){
    Route::middleware(['admin'])->group(function (){
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/logout', '\App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');
        Route::resource('/post','PostAdminController');
        Route::resource('/persetujuan','PersetujuanController');
        Route::get('/daftar-penelitian','PersetujuanController@indexPenelitian')->name('admin.index.penelitian');
        Route::get('/daftar-pengabdian', 'PersetujuanController@indexPengabdian')->name('admin.index.pengabdian');
        Route::get('/revisi','PersetujuanController@revisi');
        Route::get('/sedang_berjalan', 'PPMSedangBerjalan@indexAdmin')->name('admin.sedang_berjalan');
        Route::get('/daftar_riwayat','RiwayatPenelitianController@indexAdmin')->name('admin.riwayat');
        Route::get('/daftar_riwayat/pertemuan','RiwayatPenelitianController@indexAdminPertemuan')->name('admin.riwayat.pertemuan');
        Route::get('/daftar_riwayat/publikasi','RiwayatPenelitianController@indexAdminPublikasi')->name('admin.riwayat.publikasi');
        Route::resource('/waktu_pengajuan','WaktuPengajuanController');
        Route::resource('/file','FileAdminController');
    });
    Route::middleware(['web'])->group(function (){
        Route::get('/login', '\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
    });
});

Route::prefix('users')->group(function(){
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'PostController@index')->name('home');
        Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('users.logout');
        Route::resource('/profil','ProfileController');
        Route::resource('/pengajuan_penelitian','PengajuanPenelitianController');
        Route::resource('/pengajuan_pengabdian','PengajuanPengabdianController');
        Route::resource('/daftar_pengajuan', 'DaftarPengajuanController');
        Route::resource('/pengajuan_penelitian/anggota_penelitian','AnggotaPenelitianController');
        Route::resource('/pengajuan_pengabdian/anggota_pengabdian','AnggotaPengabdianController');
        Route::resource('/riwayat', 'RiwayatPenelitianController');
//        Route::resource('/sedang_berjalan/luaran','LuaranController');
        Route::get('/gantiPassword','HomeController@gantiPasswordIndex');
        Route::get('/daftar_luaran','LuaranController@index');
        route::get('/profil/getProdi/{id}','ProfileController@getProdis');
        Route::get('/download','DownloadFileController@index');
        Route::get('/sedang_berjalan','PPMSedangBerjalan@index')->name('sedang_berjalan.index');
        Route::get('/sedang_berjalan/luaran/{id}', [
            'as' => 'luaran.create',
            'uses' => 'LuaranController@create'
        ]);
        Route::get('/sedang_berjalan/luaran/publikasi/{id}', [
            'as' => 'publikasi.create',
            'uses' => 'LuaranController@createPublikasi'
        ]);
        Route::get('/sedang_berjalan/luaran/publikasi/{id}/show', [
            'as' => 'publikasi.show',
            'uses' => 'LuaranController@showPublikasi'
        ]);
        Route::get('/sedang_berjalan/luaran/pertemuan/{id}', [
            'as' => 'pertemuan.create',
            'uses' => 'LuaranController@createPertemuan'
        ]);
        Route::get('/sedang_berjalan/luaran/pertemuan/{id}/show', [
            'as' => 'pertemuan.show',
            'uses' => 'LuaranController@showPertemuan'
        ]);

        Route::get('/sedang_berjalan/luaran/haki/{id}/show', [
            'as' => 'haki.show',
            'uses' => 'LuaranController@showHaki'
        ]);
        Route::get('/sedang_berjalan/luaran/haki/{id}', [
            'as' => 'haki.create',
            'uses' => 'LuaranController@createHaki'
        ]);
        Route::get('/sedang_berjalan/luaran/prototype/{id}/show', [
            'as' => 'prototype.show',
            'uses' => 'LuaranController@showPrototype'
        ]);
        Route::get('/sedang_berjalan/luaran/prototype/{id}', [
            'as' => 'prototype.create',
            'uses' => 'LuaranController@createPrototype'
        ]);

        Route::get('/riwayat/publikasi/tambah',[
            'as' => 'riwayat.publikasi.create',
            'uses' => 'RiwayatPenelitianController@createPublikasi'
        ]);
        Route::get('/riwayat/pertemuan/tambah',[
            'as' => 'riwayat.pertemuan.create',
            'uses' => 'RiwayatPenelitianController@createPertemuan'
        ]);

        Route::post('/gantiPassword','HomeController@gantiPassword')->name('gantiPassword');
        Route::post('','LuaranController@store')->name('luaran.store');
        Route::post('/sedang_berjalan/luaran/publikasi/{id}','LuaranController@storePublikasi')->name('luaran.publikasi.store');
        Route::post('/sedang_berjalan/luaran/pertemuan/{id}','LuaranController@storePertemuan')->name('luaran.pertemuan.store');
        Route::post('/sedang_berjalan/luaran/haki/{id}','LuaranController@storeHaki')->name('luaran.haki.store');
        Route::post('/sedang_berjalan/luaran/prototype/{id}','LuaranController@storePrototype')->name('luaran.prototype.store');
        Route::post('/riwayat/publikasi/tambah','RiwayatPenelitianController@storePublikasi')->name('riwayat.publikasi.store');
        Route::post('/riwayat/pertemuan/tambah','RiwayatPenelitianController@storePertemuan')->name('riwayat.pertemuan.store');
        Route::post('/sedang_berjalan/kelengkapan/store','KelengkapanController@store')->name('kelengkapan.store');
//        Route::put('/sedang_berjalan/luaran','LuaranController@update')->name('luaran.update');
        Route::match(array('PUT', 'PATCH'), "/sedang_berjalan/luaran/{id}", array(
            'uses' => 'LuaranController@update',
            'as' => 'luaran.update'
        ));
        Route::match(array('PUT', 'PATCH'), "/sedang_berjalan/kelengkapan/{id}", array(
            'uses' => 'KelengkapanController@update',
            'as' => 'kelengkapan.update'
        ));

    });



});
