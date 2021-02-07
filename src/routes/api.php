<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function(){
  return response()->json([
    'name' => 'Devmunity API',
    'version' => '1.0.0',
    'status' => 'OK'
  ]);
});

Route::resource('users', 'UserController');

Route::group(array('prefix' => '/users'), function() {
  Route::get('/nome/{nome}', 'UserController@findName')->where('nome', '[A-Za-z]+')->name('findName');
  Route::get('/cidade/{cidade}', 'UserController@findCity')->name('findCity');
  Route::get('/estado/{estado}', 'UserController@findState')->name('findState');
  Route::get('/linguagem/{linguagem}', 'UserController@findLanguage')->name('findLanguage');
  Route::get('/cidade/{cidade}/linguagem/{linguagem}', 'UserController@findCity_LP')->name('findCity_LP');
  Route::get('/estado/{estado}/linguagem/{linguagem}', 'UserController@findState_LP')->name('findState_LP');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Auth::routes();
