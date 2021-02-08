<?php

use App\User;

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
  return redirect('/home');
});

/*
Route::group(array('prefix' => 'auth'), function() {
    //  Autenticação
    //Route::resource('login', 'Auth\AuthController');
    
    Route::get('login', function(){
        return view('auth.login');
    });
    Route::post('login', 'UserController@login')->name('login');

    /*
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('login', 'Auth\AuthController@getLogout');
    

    //  Registração
    Route::get('register', function(){
        $user = new User;
        return view('auth.register', ['user' => $user]);
    });
    Route::post('register', 'UserController@register')->name('register');
    
    /*
    Route::get('register', 'Auth\AuthController@getLogin');
    Route::get('register', 'Auth\AuthController@getLogin');
    
});
*/

Route::get('/home', 'HomeController@index')->name('home');

