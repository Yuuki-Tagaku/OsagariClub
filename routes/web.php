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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\SupplyController;
use vendor\laravel\framework\src\Illuminate\Routing;;


Route::get('/',"SupplyController@search");

Route::resource('supplies', 'SupplyController');

Route::get('/supplies.list', [SupplyController::class, 'list'])->name('supplies_list');

Route::get("supplies/1/confirmation", "SupplyController@confirmation");
