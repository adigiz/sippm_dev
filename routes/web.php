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


Route::get('/home', 'PostController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('admin')->group(function (){
    Route::get('/login', '\App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/post','PostAdminController');
    Route::resource('/persetujuan','PersetujuanController');
    Route::get('/disetujui','PersetujuanController@disetujui');
    Route::get('/ditolak', 'PersetujuanController@ditolak');
    Route::get('/direvisi','PersetujuanController@direvisi');
    Route::resource('/waktu_pengajuan','WaktuPengajuanController');
    Route::resource('/file','FileAdminController');
});

Route::prefix('users')->group(function(){
    Route::resource('/profil','ProfileController');
    Route::resource('/pengajuan_penelitian','PengajuanPenelitianController');
    Route::resource('/pengajuan_pengabdian','PengajuanPengabdianController');
    Route::resource('/daftar_pengajuan', 'DaftarPengajuanController');
    Route::resource('/pengajuan_penelitian/anggota_penelitian','AnggotaPenelitianController');
    Route::resource('/pengajuan_pengabdian/anggota_pengabdian','AnggotaPengabdianController');
//    Route::post('/profil/{id}/edit/getProdi/{idProdi}', 'ProfileController@getProdis{idProdi}');
    route::get('/profil/getProdi/{id}','ProfileController@getProdis');
    Route::get('/download','DownloadFileController@index');
    Route::get('/sedang_berjalan','PPMSedangBerjalan@index');


});
//Route::resource('admin/post','PostAdminController');