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
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::middleware(['auth'])->group(function(){

    Route::get('/forum', 'Forum\ForumController@index')->name('forum.index');

    Route::group(['middleware'=>['mod']], function(){
        Route::get('/forum/dashboard', 'Forum\ForumDashboardController@index')->name('forumdashboard.index');
	});

    Route::get('/chat', 'Chat\ChatController@index')->name('chat.index');
    Route::post('/chat/searchnewuser', 'Chat\ChatController@searchnewuser')->name('chat.searchnewuser');
    Route::post('/chat/searchmessage', 'Chat\ChatController@searchmessage')->name('chat.searchmessage');
    Route::post('/chat/getallmessages', 'Chat\ChatController@getallmessages')->name('chat.getallmessages');
    Route::get('/chat/gossiproom', 'Chat\ChatController@gossiproom')->name('chat.gossiproom');
    Route::get('/chat/{convid}','Chat\ChatController@conversation')->name('chat.conversation');

});
