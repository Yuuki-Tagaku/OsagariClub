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

use App\Http\Controllers\SupplyController;
use vendor\laravel\framework\src\Illuminate\Routing;;



Route::get('search',"SupplyController@search");

Route::resource('supplies', 'SupplyController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('edit', function () {
    return view('osagariclub/supplyEdit');
});