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
    return view('home');
});

Route::get('/login','AuthController@login' )->name('login');
Route::post('/postlogin','AuthController@postlogin' );
Route::get('/logout','AuthController@logout' );

Route::group(['middleware'=> ['auth','checkRole:admin']], function(){

    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'siswaController@create');
    Route::get('/siswa/{id}/edit', 'SiswaController@edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/{id}/delete', 'SiswaController@delete');
    Route::get('/siswa/{id}/profile', 'siswaController@profile');
    Route::post('/siswa/{id}/addnilai', 'siswaController@addnilai');
});

Route::group(['middleware'=> ['auth','checkRole:admin,siswa']], function(){
    Route::get('/dashboard', 'DashboardController@index');
});
