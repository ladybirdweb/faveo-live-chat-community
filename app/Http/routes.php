<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'HomeController@getIndex']);
Route::get('/agent-profile', ['as' => '/agent-profile', 'uses' => 'HomeController@getAgentProfile']);
Route::get('/profile', ['as' => '/profile', 'uses' => 'HomeController@getProfile']);
Route::get('/profile-edit', ['as' => '/profile-edit', 'uses' => 'HomeController@getProfileEdit']);
Route::get('/setting', ['as' => '/setting', 'uses' => 'HomeController@getSetting']);
/* Agent */ 
Route::get('/operators', ['as' => '/operators', 'uses' => 'HomeController@getOperators']);
Route::get('/operators/add', ['as' => '/operators/add', 'uses' => 'HomeController@getOperatorsAdd']);
Route::post('/operators/add', ['as' => '/operators/add', 'uses' => 'OperatorsController@doAdd']);
Route::get('/operators/edit/{id}', ['as' => '/operators/edit/{id}', 'uses' => 'HomeController@getOperatorsEdit']);
Route::post('/operators/edit', ['as' => '/operators/edit', 'uses' => 'OperatorsController@doEdit']);
/* End Agent */ 
Route::get('/widget-theme', ['as' => '/widget-theme', 'uses' => 'HomeController@getWidgetTheme']);
/* Canned */ 
Route::get('/canned-message', ['as' => '/canned-message', 'uses' => 'HomeController@getCannedMessage']);
Route::get('/canned-message/add', ['as' => '/canned-message/add', 'uses' => 'HomeController@getCannedMessageAdd']);
Route::post('/canned-message/add', ['as' => '/canned-message/add', 'uses' => 'CannedController@doAdd']);
Route::get('/canned-message/edit/{id}', ['as' => '/canned-message/edit/{id}', 'uses' => 'HomeController@getCannedMessageEdit']);
Route::post('/canned-message/edit', ['as' => '/canned-message/edit', 'uses' => 'CannedController@doEdit']);
Route::get('/canned-message/delete', ['as' => '/canned-message/delete', 'uses' => 'CannedController@doDelete']);
/* End Canned */ 
Route::get('/message-history', ['as' => '/message-history', 'uses' => 'HomeController@getMessageHistory']);
Route::get('/message-history/list', ['as' => '/message-history/list', 'uses' => 'HomeController@getMessageHistoryList']);
Route::get('/logs', ['as' => '/logs', 'uses' => 'HomeController@getLogs']);

Route::get('/login', ['as' => '/login', 'uses' => 'UserController@getLogin']);
Route::post('/login', ['as' => '/login', 'uses' => 'UserController@doLogin']);
Route::get('/logout', ['as' => '/logout', 'uses' => 'UserController@doLogout']);
/* Chat */ 
Route::get('/chat', ['as' => '/chat', 'uses' => 'HomeController@getChat']);
Route::get('/ip', ['as' => '/ip', 'uses' => 'ClientController@getClientDetails']);
Route::get('/agent/update', ['as' => '/agent/update', 'uses' => 'ClientController@updateAgent']);
Route::post('/online/update', ['as' => '/online/update', 'uses' => 'ClientController@getPoOnline']);
Route::post('/online/agent/update', ['as' => '/online/agent/update', 'uses' => 'ClientController@getAgentOnline']);
Route::get('/delete/ip', ['as' => '/delete/ip', 'uses' => 'ClientController@deleteIP']);
Route::post('/chat/contact', ['as' => '/chat/contact', 'uses' => 'ClientController@getChatContact']);
/* End Chat */ 