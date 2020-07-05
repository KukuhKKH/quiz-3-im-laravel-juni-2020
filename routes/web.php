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

Route::get('/artikel/create', 'ArtikelController@create')->name('artikel.create'); // menampilkan halaman form
Route::post('/artikel', 'ArtikelController@store')->name('artikel.store'); // menyimpan data
Route::get('/artikel', 'ArtikelController@index')->name('artikel.index'); // menampilkan semua
Route::get('/artikel/{id}', 'ArtikelController@show')->name('artikel.show'); // menampilkan detail item dengan id 
Route::get('/artikel/{id}/edit', 'ArtikelController@edit')->name('artikel.edit'); // menampilkan form untuk edit item
Route::put('/artikel/{id}', 'ArtikelController@update')->name('artikel.update'); // menyimpan perubahan dari form edit
Route::delete('/artikel/{id}', 'ArtikelController@destroy')->name('artikel.destroy'); // menghapus data dengan id