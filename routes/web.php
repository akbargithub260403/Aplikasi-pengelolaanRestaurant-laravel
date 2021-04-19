<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth','CheckRole:Administrator']],function(){
    Route::get('/register','AdminController@create')->name('add_Admin');
    Route::post('/register/add_Admin','AdminController@store');
    Route::post('/add/Order/dibuat','PesananController@store');
    Route::get('/list/Order','PesananController@listOrder');
    Route::get('/generate/laporan','AdminController@export');
    Route::get('/add/Menu','DaftarmenuController@create');
    Route::post('/add/Menu/dibuat','DaftarmenuController@store');
    Route::get('/add/paketMenu','DaftarMenuController@create_paketMenu');
    Route::post('/add/paketMenu/dibuat','DaftarMenuController@store_paketMenu');
    Route::get('/detail/paketMenu/{id}','DaftarMenuController@show_Paket');
    Route::post('/add/OrderPaket/dibuat','PesananController@storePaket');
    Route::delete('/delete/menu/{id}','DaftarMenuController@destroy');
    Route::get('/update/menu/{id}','DaftarMenuController@edit');
    Route::patch('/update/berhasil/{id}','DaftarMenuController@update');
    Route::delete('/delete/Paketmenu/{id}','DaftarMenuController@destroyPaketmenu');
    Route::get('/update/Paketmenu/{id}','DaftarMenuController@editPaketmenu');
    Route::patch('/update/Paketmenu/berhasil/{id}','DaftarMenuController@updatePaket')->name('updatePaketMenu');
});

Route::group(['middleware'  => ['auth','CheckRole:Administrator,Waiter']],function(){
    Route::get('/register','AdminController@create')->name('add_Admin');
    Route::post('/register/add_Admin','AdminController@store');
    Route::post('/add/Order/dibuat','PesananController@store');
    Route::get('/generate/laporan','AdminController@export');
    
});

Route::group(['middleware' => ['auth','CheckRole:Administrator,Waiter,Kasir']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/register','AdminController@create')->name('add_Admin');
    Route::post('/register/add_Admin','AdminController@store');
    Route::get('/list/Order','PesananController@listOrder');
    Route::get('/generate/laporan','AdminController@export'); 
});

Route::group(['middleware' => ['auth','CheckRole:Administrator,Waiter,Kasir,Owner']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/generate/laporan','AdminController@export'); 
});

Route::group(['middleware' => ['auth','CheckRole:Administrator,Waiter,Kasir,Owner,Pelanggan']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/add/Order/dibuat','PesananController@store');
    Route::get('/detail/{id}','DaftarMenuController@show');
    Route::get('/paketMenu','DaftarMenuController@paketMenu');
    Route::get('/detail/paketMenu/{id}','DaftarMenuController@show_Paket');
    Route::post('/add/OrderPaket/dibuat','PesananController@storePaket');
});