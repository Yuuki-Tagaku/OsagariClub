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

//スマホサイドの最初の画面
Route::get('/', "UserController@index");
//ログアウト
Route::get('/logout', 'UserController@logout');

//ユーザー関係のルート
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit', 'UserController@branch')->name('user.branch');
Route::get('/user/delete', 'UserController@delete');
Route::get('/user/create', 'UserController@add');
Route::post('/user/create', 'UserController@create')->name('user.create');
Route::get('/welcome', 'UserController@welcome');
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@signin')->name('user.login');
Route::get('/user/show', 'UserController@show');

//チャット関係のルート
Route::get('/chat/room', 'ChatController@chatroom')->name('chat.room');//チャットルームのルート
Route::get('/chat/create', 'ChatController@create');
Route::get('/chat/index', 'ChatController@index');

//チャット用ajax
Route::get('ajax/chat', 'Ajax\ChatController@index');//メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create');//チャット登録

//マッチング関係のルート
Route::get('/matchi/confirm', 'ChatController@home');
Route::post('/matchi/confirm', 'ChatController@matcing');

//おさがり関係のルート

Route::get('/supply/edit', 'SupplyController@edit');//後でコントローラ買えます。一時的なルート
Route::post('/supply/edit', 'SupplyController@branch')->name('supply.branch');
Route::get('/supply/create', 'SupplyController@create');
Route::post('/supply/create', 'SupplyController@store')->name('supply.create');
Route::get('/supply/delete/confirm', "SupplyController@confirm")->name('supplydeleteconfirm');
Route::get('/supplydelete', "SupplyController@delete")->name('supplydelete');
Route::get('/supply/index', 'SupplyController@index');
Route::get('/supply/show', 'SupplyController@show')->name('supply.show');

// おさがり検索画面へ
Route::get('/search',"SupplyController@search");

Auth::routes();


//管理者ルート
Route::get('/userlist', 'AdminController@search')->name('userlist');
Route::get('/userlist/detail', 'AdminController@updata');
Route::get('/supplylist', 'AdminSupplyController@search')->name('supplylist');
Route::get('/supplylist/detail', 'AdminSupplyController@edit');
Route::get('/chatlist', 'AdminSupplyController@chatsearch');
Route::get('/chatlist/detail', 'AdminSupplyController@updata');

