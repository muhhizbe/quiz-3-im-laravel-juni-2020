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
    return view('erd');
});
Route::get('/home', function () {
    return view('layouts.master');
});

Route::prefix('artikel')->group(function () {
    Route::get('/', 'ArtikelController@index');
    Route::get('/create', 'ArtikelController@create');
    Route::post('/', 'ArtikelController@store');
    Route::get('/{id}', 'ArtikelController@show');
    Route::get('/{id}/edit', 'ArtikelController@edit');
    Route::put('/{id}', 'ArtikelController@update');
    Route::delete('/{id}', 'ArtikelController@destroy');
});

Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id