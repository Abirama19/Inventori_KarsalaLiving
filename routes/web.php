<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserPermissionsMiddleware;
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

Auth::routes();

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {    
    Route::get('/', '\App\Http\Controllers\DashboardController@get', function () {
        return view('index');
    });
    
    Route::get('/barang', '\App\Http\Controllers\BarangController@get');
    Route::get('/barang/create', '\App\Http\Controllers\BarangController@create');
    Route::post('/barang/store', '\App\Http\Controllers\BarangController@store');
    Route::get('/barang/delete/{id}', '\App\Http\Controllers\BarangController@delete');
    Route::get('/barang/update/{id}', '\App\Http\Controllers\BarangController@update');
    Route::post('/barang/update', '\App\Http\Controllers\BarangController@updateBarang');
    
    Route::middleware(UserPermissionsMiddleware::class)->group(function(){        
        Route::get('/store', '\App\Http\Controllers\StoreController@get');
        Route::get('/store/create', '\App\Http\Controllers\StoreController@create');
        Route::post('/store/store', '\App\Http\Controllers\StoreController@store');
        Route::get('/store/delete/{id}', '\App\Http\Controllers\StoreController@delete');
        Route::get('/store/update/{id}', '\App\Http\Controllers\StoreController@update');
        Route::post('/store/update', '\App\Http\Controllers\StoreController@updateStore');

        Route::get('/pegawai', '\App\Http\Controllers\PegawaiController@get');
        Route::get('/pegawai/create', '\App\Http\Controllers\PegawaiController@create');
        Route::post('/pegawai/store', '\App\Http\Controllers\PegawaiController@store');
        Route::get('/pegawai/delete/{id}', '\App\Http\Controllers\PegawaiController@delete');
        Route::get('/pegawai/update/{id}', '\App\Http\Controllers\PegawaiController@update');
        Route::post('/pegawai/update', '\App\Http\Controllers\PegawaiController@updatePegawai');
        
        Route::get('/user/add', [LoginController::class, 'addUser']);
        Route::post('/user/save', [LoginController::class, 'saveUser']);
    });

    Route::get('/transaksi', '\App\Http\Controllers\TransaksiController@get');
    Route::get('/transaksi/create', '\App\Http\Controllers\TransaksiController@create');
    Route::post('/transaksi/store', '\App\Http\Controllers\TransaksiController@store');
    Route::get('/transaksi/delete/{id}', '\App\Http\Controllers\TransaksiController@delete');    
});