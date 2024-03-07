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
    return view('welcome');
});

Auth::routes();

//一覧画面
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('items.index');
//登録画面
Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create');
//登録処理
Route::post('/items/store/', 'App\Http\Controllers\ItemController@store')->name('item.store');
//
Route::get('/items/edit/{item}', 'App\Http\Controllers\ItemController@edit')->name('item.edit');
//更新
Route::put('/items/edit/{item}', 'App\Http\Controllers\ItemController@update')->name('item.update');
//
Route::get('/items/show/{item}', 'App\Http\Controllers\ItemController@show')->name('item.show');
//
Route::put('/items/edit/{item}', 'App\Http\Controllers\ItemController@update')->name('item.update');
