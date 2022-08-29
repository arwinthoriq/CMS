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

//Auth::routes();
Auth::routes([
    'register' => true, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
    'login' => true, // Login enabled
]);

Route::group(['prefix'=>'admin','middleware'=>'akses.admin'], function() { //admin
    Route::get('/home', 'AdminController@dashboard')->name('admin-home'); //dashboard

    Route::get('/home/kategori', 'AdminController@kategori')->name('admin-kategori'); //daftar kategori
    Route::get('/home/kategori/tambah','AdminController@kategoriform')->name('admin-kategori-form'); //form tambah kategori
    Route::post('/home/kategori/tambah','AdminController@kategoritambah'); //tambah kategori
    Route::delete('/home/kategori/{id}','AdminController@kategorihapus'); // hapus kategori
    Route::get('/home/kategori/edit/{id}','AdminController@kategoriformedit'); //passing id edit rkategori
    Route::get('/home/kategori/edit','AdminController@kategoriformedit')->name('admin-kategori-form-edit'); //form edit kategori
    Route::post('/home/kategori/edit','AdminController@kategoriedit'); //edit kategori
    Route::get('/home/kategori/detail/{id}', 'AdminController@kategoridetail'); //detail kategori
    Route::get('/home/kategori/riwayat', 'AdminController@kategoririwayat')->name('admin-kategori-riwayat'); //daftar kategori
   


});

Route::group(['prefix'=>'editor','middleware'=>'akses.editor'], function() { //admin
    Route::get('/home', 'EditorController@dashboard')->name('editor-home'); //dashboard
});

Route::group(['prefix'=>'penulis','middleware'=>'akses.penulis'], function() { //admin
    Route::get('/home', 'PenulisController@dashboard')->name('penulis-home'); //dashboard
});