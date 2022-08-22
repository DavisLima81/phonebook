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

Route::resource('contatos', \App\Http\Controllers\ContactController::class);

Route::get('telefones', '\App\Http\Controllers\PhoneController@index')
    ->name('telefones.index');
/*Route::get('telefones/', '\App\Http\Controllers\PhoneController@show')
    ->name('telefones.show');*/
Route::get('telefones/create', '\App\Http\Controllers\PhoneController@create')
    ->name('telefones.create');
Route::post('telefones.store', '\App\Http\Controllers\PhoneController@store')
    ->name('telefones.store');


//FALLBACK - caso seja requisitada uma URI desconhecida:
Route::fallback(function () {
    return view('welcome');
});
