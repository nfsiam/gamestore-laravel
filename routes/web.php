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
    
    Route::name('chat.')->group(function () {
        Route::get('/chat', 'Chat\ChatController@index')->name('index');
        Route::post('/chat/searchnewuser', 'Chat\ChatController@searchnewuser')->name('searchnewuser');
        Route::post('/chat/searchmessage', 'Chat\ChatController@searchmessage')->name('searchmessage');
        Route::post('/chat/getallmessages', 'Chat\ChatController@getallmessages')->name('getallmessages');
        Route::post('/chat/getallmessages', 'Chat\ChatController@getallmessages')->name('getallmessages');
        Route::get('/chat/gossiproom', 'Chat\ChatController@gossiproom')->name('gossiproom');
        Route::get('/chat/{convid}', 'Chat\ChatController@conversation')->name('conversation');
    });

    Route::name('forum.')->group(function () {
        Route::get('/forum', 'Forum\ForumController@index')->name('index');

        Route::post('/forum/search-post', 'Forum\ForumController@searchpost')->name('searchpost');

        Route::get('/forum/create-post', 'Forum\PostController@create')->name('createpost');
        Route::post('/forum/create-post', 'Forum\PostController@store')->name('createpost');

        Route::get('/forum/post/{id}', 'Forum\PostController@show')->name('showpost');
        Route::post('/forum/post-del-req', 'Forum\PostController@postdelreq')->name('postdelreq');

        Route::group(['middleware'=>['mod']], function(){
            Route::get('/forum/dashboard', 'Forum\ForumDashboardController@index')->name('dashboard.index');
            Route::get('/forum/dashboard/pending-posts/{id}', 'Forum\PostController@showpending')->name('dashboard.showpending');
        });
    });

});
