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
Route::middleware(['auth'])->group(function () {
    //All the routes are placed in here
    Route::get('/', 'Auth\LoginController@index');
});
*/
Route::group(array('prefix' => 'api'), function() {
    Route::get('/', function(){
        return response()->json(['message' => 'Devmunity API', 'status' => 'Conectado']);
    });

    Route::resource('users', 'UserController');

    Route::get('users/cidade/{cidade}', 'UserController@findCity')->name('findCity');
    Route::get('users/estado/{cidade}', 'UserController@findState')->name('findState');
    Route::get('users/linguagem/{cidade}', 'UserController@findLanguage')->name('findLanguage');
    Route::get('users/cidade/{cidade}/linguagem/{linguagem}', 'UserController@findCity_LP')->name('findCity_LP');
    Route::get('users/estado/{cidade}/linguagem/{linguagem}', 'UserController@findState_LP')->name('findState_LP');


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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

