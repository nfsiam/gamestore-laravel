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
Route::get('/enduser/myprofile/editprofile','EnduserController@enduserEditprofile')->name('endEditprofile');
Route::post('/enduser/myprofile/editprofile','EnduserController@enduserEditprofileSubmit');
Route::get('/enduser/plans','EnduserController@enduserPlans')->name('endPlans');
Route::get('/enduser/games/rate/{id}','EnduserController@enduserRate');
Route::post('/enduser/games/rate/{id}','EnduserController@enduserRatePost');

Route::get('/enduser/games/gift/{id}','EnduserController@enduserGift');
Route::post('/enduser/games/gift/{id}','EnduserController@enduserGiftPost');

Route::get('/publisher/report.html','PublisherController@publisherReport')->name('pubReport');
Route::get('/publisher/store.html','PublisherController@publisherStore')->name('pubStore');
Route::get('/publisher/library.html','PublisherController@publisherLibrary')->name('pubLibrary');
Route::get('/publisher/myprofile.html','PublisherController@publisherMyprofile')->name('pubCommunity');
Route::get('/publisher/publish.html','PublisherController@publisherPublish')->name('pubPublish');
Route::post('/publisher/publish.html','PublisherController@publisherUpload')->name('pubPublishPost');

Route::get('/ajaxmethod/all/{id}','AjaxController@search');
Route::get('/ajaxmethod/lib/{id}','AjaxController@searchLib');
Route::get('/ajaxmethod/all/','AjaxController@getAll');
Route::get('/ajaxmethod/lib/','AjaxController@getAll');
Route::get('/ajaxmethod/cart/{id}','AjaxController@addToCart');
Route::get('/ajaxmethod/showcartitems/','AjaxController@showCartitems');

Route::get('ajaxmethod/updatecart/{id}','AjaxController@updateCart');

Route::get('ajaxmethod/addfriend/{id}','AjaxController@addFriend');
Route::get('ajaxmethod/removefriend/{id}','AjaxController@removeFriend');
Route::get('ajaxmethod/acceptfriend/{id}','AjaxController@acceptFriend');


Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/forum', 'Forum\ForumController@index')->name('forum.index');
Route::get('/forum/dashboard', 'Forum\ForumDashboardController@index')->name('forumdashboard.index');

Route::get('/chat/gossiproom', 'Chat\ChatController@gossiproom')->name('chat.gossiproom');
