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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('show', 'App\Http\Controllers\ItemController@show')->name('item.show');

Route::get('search', 'App\Http\Controllers\ItemController@search')->name('search');

//新規登録
//Route::get('/items/index', 'App\Http\Controllers\ItemController@index')->name('item.index');
//削除
Route::delete('/items/{item}', 'App\Http\Controllers\ItemController@destroy')->name('item.destroy');
//削除
//Route::post('/items/{item}', 'App\Http\Controllers\ItemController@destroy')->name('item.destroy');

//一覧画面
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('items.index');
//検索
//Route::get('/items/search', 'App\Http\Controllers\ItemController@search')->name('search');
//新規登録
Route::get('/items/rebist', 'App\Http\Controllers\ItemController@rebist')->name('item.rebist');
//登録処理
Route::post('/items/store/', 'App\Http\Controllers\ItemController@store')->name('item.store');
//変更をするため
Route::get('/items/edit/{item}', 'App\Http\Controllers\ItemController@edit')->name('item.edit');
//アクセスがあった場合の更新
Route::put('/items/edit/{item}', 'App\Http\Controllers\ItemController@update')->name('item.update');
//詳細を見れる
Route::get('/items/show/{item}', 'App\Http\Controllers\ItemController@show')->name('item.show');

//詳細を見れる
Route::get('/items/details/{item}', 'App\Http\Controllers\ItemController@details')->name('item.details');



Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create');
