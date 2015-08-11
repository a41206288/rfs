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
//民眾用頁面route
Route::get('/', 'UsersHomeController@index');
Route::get('call/input', 'UsersCallController@index');
Route::post('call/input', 'UsersCallController@create');
Route::get('donate/input', 'UsersDonateController@index');
Route::post('donate/input', 'UsersDonateController@show');
Route::get('guidance', 'UsersGuidanceController@index');
//Route::get('guidance_map', 'GuidanceController@');
Route::get('application/input', 'UsersApplicationController@index');
Route::post('application/input', 'UsersApplicationController@create');
Route::get('missing_poster/input', 'UsersMissingPosterController@index');

//登入用route
Route::get('login', 'UsersLoginController@show');
Route::post('login', 'UsersLoginController@login');
Route::get('logout', 'UsersLoginController@logout');
//這行上面的請勿移動


//-------------------------------------------分隔線-------------------------------------------------------

//測試用

//下面請根據權限放至各Panel下  (此為暫放)

Route::get('analysis/manage', 'AnalysisAnalysisController@index');
Route::post('report/reliever', 'EmtReportController@create');
Route::get('report/reliever', 'RelieverReportController@index');
Route::post('report/reliever', 'RelieverReportController@create');
Route::get('victim/EMT', 'EmtVictimController@index');

Route::get('resource/manage/product/local', 'ResourceLocalProductController@index');
Route::get('resource/manage/product/center', 'ResourceCenterProductController@index');
Route::get('resource/manage/people/local', 'ResourceLocalPeopleController@index');
Route::get('resource/manage/people/center', 'ResourceCenterPeopleController@index');

//Route::get('analysis/manage', 'AnalysisController@index');

//Route::get('mission/manage/local', 'MissionLocalController@index');
//Route::post('mission/manage/local', 'MissionLocalController@update');
//-------------------------------------------分隔線-------------------------------------------------------

//需要設定權限的route
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
        Route::get('call/manage',array('as' => 'administratorPanel', 'uses' => 'CenterCallController@index'));
        //call manage 動態印出通報用
        Route::post('call/manage', 'CenterCallController@update');
        Route::post('call/manage/save', 'CenterCallController@store');

        //call manage 創建新任務
        Route::post('call/manage/createMission', 'CenterMissionController@create');
        //Route::get('call/manage/auto_complete', 'MissionController@auto_complete');//auto_complete

        //mission manage()
        //中央指揮官

        Route::get('mission/manage', 'CenterMissionController@index');
        Route::post('mission/manage/support', 'CenterMissionController@store');

//        Route::post('mission/manage/supportPeople', 'CenterMissionController@store');
//        Route::post('mission/manage/supportProducts', 'CenterMissionController@store');


       // Route::get('post','HomeController@index');
    });

//Route::group([
//    //'namespace' => 'moderatorPanel',
//    'middleware' => ['auth', 'acl'],
//    'is' => 'center'],
//    function () {
//        //Route::get('call/manage',array('as' => 'administratorPanel', 'uses' => 'CallController@index'));
//        Route::get('user_pages/home',array('as' => 'centerPanel', 'uses' => 'PagesController@index'));
//        //Route::get('user_pages.home', 'PagesController@index');
//    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'local'],
    function () {
        Route::get('mission/manage/local',array('as' => 'localPanel', 'uses' => 'LocalMissionController@index') );
        Route::get('analysis/manage/local', 'LocalAnalysisController@index');
        Route::post('analysis/manage/local', 'LocalAnalysisController@edit');
    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'analysis'],
    function () {
        Route::get('analysis/manage', array('as' => 'analysisPanel', 'uses' => 'AnalysisAnalysisController@index'));
        //analysis manage 創建新地點
        Route::post('analysis/manage/createLocation', 'AnalysisAnalysisController@create');
        Route::post('analysis/manage/updateLocation', 'AnalysisAnalysisController@update');
    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'emt'],
    function () {
        Route::get('report/EMT',array('as' => 'emtPanel', 'uses' => 'EmtReportController@index') );
    });



