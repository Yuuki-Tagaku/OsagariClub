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


//ユーザー関係のルート
Route::get('/user/edit', 'UserController@edit')->middleware('admin_auth');
Route::post('/user/edit', 'UserController@branch')->middleware('admin_auth')->name('user.branch');
Route::get('/user/delete', 'UserController@delete')->middleware('admin_auth');

//チャット関係のルート
Route::get('/chat/room', 'ChatController@chatroom')->middleware('admin_auth');//チャットルームのルート
//チャット用ajax
Route::get('ajax/chat', 'Ajax\ChatController@index')->middleware('admin_auth');//メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create')->middleware('admin_auth');//チャット登録

//マッチ関係のルート
Route::get('/matchi/confirm', 'ChatController@home')->middleware('admin_auth');
Route::post('/matchi/confirm', 'ChatController@matcing')->middleware('admin_auth');

//おさがり関係のルート
Route::get('/supply/edit', 'ChatController@edit')->middleware('admin_auth');//後でコントローラ買えます。一時的なルート
Route::post('/supply/edit', 'ChatController@branch')->middleware('admin_auth')->name('supply.branch');

//商品登録ルート

Route::resource('supplies', 'SupplyController');

//おさがり削除ルート
Route::get('/confirm', "SupplyController@confirm")->name('supplydeleteconfirm');
Route::get('/supplydelete', "SupplyController@delete")->middleware('admin_auth')->name('supplydelete');


// お下がり検索画面へ
Route::get('search',"SupplyController@search");


Auth::routes();


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');



//管理者ルート
Route::get('/supplylist', 'AdminSupplyController@search')->middleware('admin_auth')->name('supplylist');



