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

Route::get('/', 'PagesController@index');
Route::get('manage', 'PagesController@show');
//Route::get('login', 'LoginController@index');
//Route::post('login', 'LoginController@login');
//Route::resource('post', 'HomeController');

//Route::group(function () {
//
//    //Route::resource('post',array('as' => 'administratorPanel', 'uses' => 'HomeController') );
//    Route::get('post',array('as' => 'administratorPanel', 'uses' => 'HomeController@index'));
//    Route::get('user_pages.home',array('as' => 'moderatorPanel', 'uses' => 'PagesController@index'));
//    //Route::resource('post', 'HomeController');
//}
//
//);
Route::group([
   // 'namespace' => 'administratorPanel',
    'middleware' => ['auth', 'acl'],
    'is' => 'administrator'],
    function () {
        Route::get('post',array('as' => 'administratorPanel', 'uses' => 'HomeController@index'));
       // Route::get('post','HomeController@index');
    });

Route::group([
    //'namespace' => 'moderatorPanel',
    'middleware' => ['auth', 'acl'],
    'is' => 'moderator'],
    function () {
        Route::get('user_pages/home',array('as' => 'moderatorPanel', 'uses' => 'PagesController@index'));
        //Route::get('user_pages.home', 'PagesController@index');
    });




Route::get('login', 'LoginController@show');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
//Route::get('logout', 'LoginController@logout');
