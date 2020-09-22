<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/enduser/home','EnduserController@enduserHome')->name('endHome');
Route::get('/enduser/store','EnduserController@enduserStore')->name('endStore');
Route::get('/enduser/library','EnduserController@enduserLibrary')->name('endLibrary');
Route::get('/enduser/community','EnduserController@endCommunity')->name('endCommunity');
Route::get('/enduser/connect','EnduserController@enduserConnect')->name('endConncet');
Route::get('/enduser/myprofile','EnduserController@enduserMyprofile')->name('endMyprofile');
Route::get('/enduser/plans','EnduserController@enduserPlans')->name('endPlans');

Route::get('/publisher/report','PublisherController@publisherReport')->name('pubReport');
Route::get('/publisher/store','PublisherController@publisherStore')->name('pubStore');
Route::get('/publisher/library','PublisherController@publisherLibrary')->name('pubLibrary');
Route::get('/publisher/myprofile','PublisherController@publisherMyprofile')->name('pubCommunity');
Route::get('/publisher/publish','PublisherController@publisherPublish')->name('pubPublish');

Route::post('/publisher/publish','PublisherController@publisherUpload')->name('pubPublishPost');




Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/forum', 'Forum\ForumController@index')->name('forum.index');
Route::get('/forum/dashboard', 'Forum\ForumDashboardController@index')->name('forumdashboard.index');

Route::get('/chat/gossiproom', 'Chat\ChatController@gossiproom')->name('chat.gossiproom');
