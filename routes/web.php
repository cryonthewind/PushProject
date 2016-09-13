<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/','UserController@index' );

Auth::routes();
Route::post('/api/Push/getPush', 'Api\PushController@getPush');
Route::post('/api/Push/registerDevice', 'Api\PushController@registerDevice');
Route::get('/push/login',['as'=>'getLogin','uses'=>'UserController@getLogin']);
Route::post('push/login',['as'=>'postLogin','uses'=>'UserController@postLogin']);
Route::get('/push/logout',['as'=>'getLogout','uses'=>'UserController@getLogout']);
Route::get('/done',['as'=>'doLogin','uses'=>'Controller@doLogin']);


Route::get('/push/pushmanagement',['as'=>'pushManagement','uses'=>'PushManagementController@pushmanagement']);

Route::get('/push/push_management_register','PushManagementController@pushManagementRegister');
Route::get('/push/push_management_register_immediately','PushManagementController@pushManagementRegisterImmediately');
Route::get('/push/push_management_update','PushManagementController@pushManagementUpdate');
Route::get('/push/push_management_confirm_immediately','PushManagementController@pushManagementConfirmImmediately');
Route::get('/push/push_management_confirm','PushManagementController@pushManagementConfirm');



Route::get('/push/confirmlog','PushManagementController@confirmlog');
Route::get('/push/confirmpast',['as'=>'confirmpast','uses'=>'ConfirmPastController@confirmpast'])->middleware('pushMiddle');
Route::get('/push/exportconfirmpast',['as'=>'exportconfirmpast','uses'=>'ConfirmPastController@exportConfirmpast']);

//Route::resource('confirmlog', 'PushLogController@index');