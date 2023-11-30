<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'webapp', 'namespace' => 'App\Http\Controllers\WebApp'], function () {

    Route::get('/', 'InicioController@index');
    // Route::get('/', function () {
    //     return view('webapp.inicio');
    // });

});