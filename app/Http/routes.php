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
Route::post('update', 'UsersHomeController@update');
Route::get('call/input', 'UsersCallController@index');
Route::post('call/input', 'UsersCallController@create');
Route::get('donate/input', 'UsersDonateController@index');
Route::post('donate/input', 'UsersDonateController@store');
Route::get('guidance', 'UsersGuidanceController@index');
//Route::get('guidance_map', 'GuidanceController@');
Route::get('application/input', 'UsersApplicationController@index');
Route::post('application/input', 'UsersApplicationController@create');
Route::get('missing_poster', 'UsersMissingPosterController@index');
Route::post('missing_poster/update', 'UsersMissingPosterController@update');//使用Ajax更新
//Route::post('missing_poster', 'UsersMissingPosterController@update');//一般送出表單更新

//登入用route
Route::get('login', 'UsersLoginController@show');
Route::post('login', 'UsersLoginController@login');
Route::get('logout', 'UsersLoginController@logout');
//這行上面的請勿移動


//-------------------------------------------分隔線-------------------------------------------------------

//測試用

//下面請根據權限放至各Panel下  (此為暫放)

Route::get('analysis/manage', 'AnalysisAnalysisController@index');





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


//Route::group([
//    'middleware' => ['auth', 'acl'],
//    'is' => 'administrator'],
//    function () {
//
//        //中央指揮官
//        Route::get('mission/manage',array('as' => 'administratorPanel','uses' => 'CenterMissionController@index'));
//        Route::post('mission/manage/support', 'CenterMissionController@store');

//        //地方指揮官
//        Route::get('mission/manage/local', 'LocalMissionController@index');
//        Route::post('mission/manage/local', 'LocalMissionController@edit');
//        Route::post('report/local', 'LocalMissionController@update');
//        Route::get('analysis/manage/local', 'LocalAnalysisController@index');
//        Route::post('analysis/manage/local', 'LocalAnalysisController@edit');
//
//        //醫療組
//        Route::get('victim/EMT','EmtVictimController@index' );
//        Route::post('victim/EMT/create', 'EmtVictimController@create');
//        Route::post('victim/EMT/edit', 'EmtVictimController@edit');
//
//        //後勤部門
//        Route::get('resource/manage/product/center', 'ResourceCenterProductController@index');
//        Route::get('resource/manage/people/center', 'ResourceCenterPeopleController@index');
//    });


Route::group([
   // 'namespace' => 'administratorPanel',
    'middleware' => ['auth', 'acl'],
    'is' => 'center'],
    function () {
//        Route::get('call/manage',array('as' => 'administratorPanel', 'uses' => 'CenterCallController@index'));
//        //call manage 動態印出通報用
//        Route::post('call/manage', 'CenterCallController@update');
        Route::post('call/manage/save', 'CenterCallController@store');
//
//        //call manage 創建新任務
        Route::post('call/manage/createMission', 'CenterMissionController@create');
        Route::post('call/manage/updateMission', 'CenterMissionController@update');
        Route::post('call/manage/destroyMission', 'CenterMissionController@destroy');
        //Route::get('call/manage/auto_complete', 'MissionController@auto_complete');//auto_complete

        //mission manage()
        //中央指揮官
        Route::get('mission/manage',array('as' => 'centerPanel', 'uses' => 'CenterMissionController@index'));
//        Route::get('mission/manage', 'CenterMissionController@index');
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
        Route::get('local/mission/manage',array('as' => 'localPanel', 'uses' => 'LocalMissionController@index') );
        Route::post('local/mission/manage/updateMissionStatus', 'LocalMissionController@update');
        Route::post('local/mission/manage/createPeopleSupport', 'LocalPeopleSupportController@create');
        Route::post('local/mission/manage/updatePeopleSupport', 'LocalPeopleSupportController@update');
        Route::post('local/mission/manage/updatePeople', 'LocalPeopleController@update');
//        Route::post('mission/manage/local', 'LocalMissionController@edit');
//        Route::post('report/local', 'LocalMissionController@update');
//        Route::get('analysis/manage/local', 'LocalAnalysisController@index');
//        Route::post('analysis/manage/local', 'LocalAnalysisController@edit');
    });

//Route::group([
//    'middleware' => ['auth', 'acl'],
//    'is' => 'analysis'],
//    function () {
//        Route::get('analysis/manage', array('as' => 'analysisPanel', 'uses' => 'AnalysisAnalysisController@index'));
//        //analysis manage 創建新地點
//        Route::post('analysis/manage/createLocation', 'AnalysisAnalysisController@create');
//        Route::post('analysis/manage/updateLocation', 'AnalysisAnalysisController@update');
//        Route::post('analysis/manage/editLocation', 'AnalysisAnalysisController@edit');
//        Route::post('analysis/manage/deleteLocation', 'AnalysisAnalysisController@destroy');
//    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'emt'],
    function () {
        Route::get('victim/EMT',array('as' => 'emtPanel', 'uses' => 'EmtVictimController@index') );
        Route::post('victim/EMT/create', 'EmtVictimController@create');
        Route::post('victim/EMT/edit', 'EmtVictimController@edit');
        Route::post('victim/EMT/update', 'EmtVictimController@update');

        Route::get('report/EMT', 'EmtReportController@index');
        Route::post('report/reliever', 'EmtReportController@create');

    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'reliever'],
    function () {
        Route::get('report/reliever',array('as' => 'relieverPanel', 'uses' => 'RelieverReportController@index') );
        Route::post('report/reliever', 'RelieverReportController@create');
    });

//Route::group([
//    'middleware' => ['auth', 'acl'],
//    'is' => 'resource'],
//    function () {
//        Route::get('resource/manage/product/local',array('as' => 'resourcePanel', 'uses' => 'ResourceLocalProductController@index') );
//        Route::get('resource/manage/people/local', 'ResourceLocalPeopleController@index');
//    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'resource'],
    function () {
        Route::get('resource/center/manage/people', array('as' => 'resourcePanel', 'uses' => 'ResourceCenterPeopleController@index'));
        Route::get('resource/center/manage/product', 'ResourceCenterProductController@index');
        Route::post('resource/manage/people/center/updatePeople', 'ResourceCenterPeopleController@update');
        Route::post('resource/manage/people/center/createPeopleSupport', 'ResourceCenterPeopleController@create');
        Route::post('resource/manage/people/center/editPeopleSupport', 'ResourceCenterPeopleController@edit');
        Route::post('resource/manage/people/center/editPeople', 'ResourceCenterPeopleController@store');
        Route::post('resource/manage/people/center/editSkill', 'ResourceCenterPeopleController@editSkill');

    });


