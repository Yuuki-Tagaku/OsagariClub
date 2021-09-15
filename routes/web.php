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
Route::get('/', "UserController@index")->name('user.home');
//ログアウト
Route::get('/logout', 'UserController@logout')->middleware('auth');

//ユーザー関係のルート
Route::get('/user/edit', 'UserController@edit')->middleware('auth');
Route::post('/user/edit', 'UserController@branch')->middleware('auth')->name('user.branch');
Route::get('/user/delete', 'UserController@delete')->name('user.delete');
Route::get('/user/create', 'UserController@add');
Route::post('/user/create', 'UserController@create')->name('user.create');
Route::get('/welcome', 'UserController@welcome')->middleware('auth');
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@signin')->name('user.login');
Route::get('/user/show', 'UserController@show')->middleware('auth');
Route::get('/user/edit/confirm', 'UserController@confirm')->middleware('auth');

//チャット関係のルート
Route::get('/chat/room', 'ChatController@chatroom')->middleware('auth')->name('chat.room');//チャットルームのルート
Route::get('/chat/create', 'ChatController@create')->middleware('auth');
Route::get('/chat/index', 'ChatController@index')->middleware('auth');

//チャット用ajax
Route::get('ajax/chat', 'Ajax\ChatController@index')->middleware('auth');//メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create')->middleware('auth');//チャット登録

//マッチング関係のルート
Route::get('/matchi/confirm', 'ChatController@home')->middleware('auth');
Route::post('/matchi/confirm', 'ChatController@matcing')->middleware('auth');
Route::get('/matchi/complete/confirm', 'SupplyController@contract')->middleware('auth');
Route::post('/matchi/complete', 'SupplyController@complete')->middleware('auth');
Route::get('/matchi/complete', 'ChatController@complete')->middleware('auth');

//おさがり関係のルート
Route::get('/supply/edit', 'SupplyController@edit')->middleware('auth');
Route::post('/supply/edit', 'SupplyController@branch')->middleware('auth')->name('supply.branch');
Route::get('/supply/create', 'SupplyController@create')->middleware('auth');
Route::post('/supply/create', 'SupplyController@store')->middleware('auth')->name('supply.create');
Route::get('/supply/create/confirm', 'SupplyController@confirm')->middleware('auth');
Route::get('/supply/delete/confirm', "SupplyController@delete")->middleware('auth')->name('supplydeleteconfirm');
Route::post('/supply/delete', "SupplyController@destroy")->middleware('auth')->name('supplydelete');
Route::get('/supply/index', 'SupplyController@index')->middleware('auth');
Route::get('/supply/show', 'SupplyController@show')->middleware('auth')->name('supply.show');
Route::get('supply/delete/complete', 'SupplyController@deleteComplete')->middleware('auth');

// おさがり検索画面へ
Route::get('/search',"SupplyController@search")->middleware('auth');

Auth::routes();


//管理者ルート
Route::get('/userlist', 'AdminController@search')->name('userlist');
Route::get('/userlist/detail', 'AdminController@updata');
Route::get('/supplylist', 'AdminSupplyController@search')->name('supplylist');
Route::get('/supplylist/detail', 'AdminSupplyController@edit');
Route::get('/chatlist', 'AdminSupplyController@chatsearch');
Route::get('/chatlist/detail', 'AdminSupplyController@updata');

//コンセプトページ
Route::get('/home', 'AdminController@home');

//パスワードリセット
Route::get('/pass/reset',           'UserController@passreset')                        ->name('pass.reset');
Route::get('/pass/edit/{token}',    'Auth\ResetPasswordController@showResetForm')      ->name('pass.edit');
Route::post('/pass/edit',           'Auth\ResetPasswordController@reset')              ->name('password.update');
Route::get('/pass/forget',          'UserController@pass_forget')                      ->name('pass.forget');