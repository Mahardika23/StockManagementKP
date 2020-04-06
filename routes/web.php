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

Route::get('/login', function () {
    return view('login');
});

Auth::routes();
Route::get('/',function(){
    return view('dashboard');
});

Route::get('/config','ConfigController@index');
Route::get('/config/getrolepermissions/{id}','ConfigController@getRolePermissions');

Route::post('/updatepermissions','ConfigController@updatePermissions');
Route::post('/rolebaru','ConfigController@addRole');

Route::prefix('/Management-Data')->group(function () {

    Route::resources([
        'kategori-barang' => "KategoriBarangController",
        'barang'          => "BarangResourceController",
        'satuan-unit'     => "UnitsResourceController",
        'gudang'          => "WarehouseResourceController",
        'pemasok'         => "SuppliersResourceController",

    ]);
 
});

Route::get('/post', 'StockController@index')->name('home')->middleware('auth');
