<?php


use App\Event;
use App\Member;
use App\Social;


use Illuminate\Http\Request;


/** * イベントトップ 表示 */
Route::get('/','EventsController@index');

/** *  イベント詳細画面 */
Route::get('/detail/{events}','EventsController@detail');

/** * イベント管理画面 */
Route::get('/events','EventsController@store');


/** * イベント参加処理 */
Route::get('/attend','MembersController@attend');
Route::post('/attend','MembersController@attend');

/** * イベント作成画面 */
Route::get('/events/new','EventsController@eventnew');

/** * イベント作成処理 */
Route::post('/events/eventadd','EventsController@create');

/** *  イベント削除 処理 */
// Route::delete('/events/{event}','EventsController@destroy');
Route::post('/events/delete/{events}','EventsController@destroy');

/** *  イベント更新画面 */
Route::post('/events/edit/{events}','EventsController@edit');

/** *  イベント更新処理 */
Route::post('/events/update','EventsController@update');

/** *  イベント複製画面 */
Route::post('/events/copy/{events}','EventsController@copy');

/** *  イベント複製処理 */
Route::post('/events/duplicate','EventsController@duplicate');



// ログイン機能使用
Auth::routes();

/** *  イベント検索結果画面 */
Route::get('/search', 'EventsController@getSearch');

// Route::get('/home', 'EventsController@index')->name('home');


/** *  ユーザー更新画面 */
Route::get('/events/profile/{users}','UsersController@edit');

/** *  ユーザー更新処理 */
Route::post('/events/profile/update','UsersController@update');


// Route::get('auth/login', 'SocialController@viewLogin');
// Route::get('auth/login/facebook', 'Auth\SocialController@redirectToFacebookProvider');
// Route::get('auth/facebook/callback', 'Auth\SocialController@handleFacebookProviderCallback');

//Facebook
// Route::get('/login/facebook', 'SocialController@getFacebookAuth');
// Route::get('/login/callback/facebook', 'SocialController@getFacebookAuthCallback');

// facebook
Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');


// Route::get('auth/login', 'Auth\SocialController@viewLogin');
// Route::get('auth/login/facebook', 'Auth\SocialController@redirectToFacebookProvider');
// Route::get('auth/facebook/callback', 'Auth\SocialController@handleFacebookProviderCallback');





// twitter
Route::get('auth/twitter', 'Auth\LoginController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\LoginController@handleProviderCallback');
Route::get("auth/twitter/logout","Auth\LoginController@getLogout");


//EMAIL
// Route::get('/events/eventadd', 'EmailsController@EventsNotification');
Route::get('/events/mail', 'EmailsController@EventsNotification');
/** * イベント作成処理 */

/** *  イベント検索結果画面 */
Route::get('/policy', 'HomeController@policy');
Route::get('/agreement', 'HomeController@agreement');
