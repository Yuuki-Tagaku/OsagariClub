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

//ユーザー関係のルート
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit', 'UserController@branch')->name('user.branch');
Route::get('/user/delete', 'UserController@delete');

//チャット関係のルート
Route::get('/chat/room', 'ChatController@chatroom');//チャットルームのルート
//チャット用ajax
Route::get('ajax/chat', 'Ajax\ChatController@index');//メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create');//チャット登録

//マッチ関係のルート
Route::get('/matchi/confirm', 'ChatController@home');
Route::post('/matchi/confirm', 'ChatController@matcing');

//おさがり関係のルート
Route::get('/supply/edit', 'ChatController@edit');//後でコントローラ買えます。一時的なルート
Route::post('/supply/edit', 'ChatController@branch')->name('supply.branch');