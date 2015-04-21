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
use Illuminate\Support\Facades\App;

Route::get('login', 'LoginController@show');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::get('/','HomeController@index');
////Route::get('manage','PagesController@show');
//Route::get('login', [
//    'as' => 'login',
//    'uses' => 'PagesController@login'
//]);
//Route::group(['prefix' => 'user',
//    'middleware' => ['auth', 'acl'],
//    'is' => 'administrator'],
//    function () {
//        Route::resource('manage', 'PagesController@show');
//    });