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

        Route::get('/forum/create-post', 'Forum\Post\CreatePostController@create')->name('createpost');
        Route::post('/forum/create-post', 'Forum\Post\CreatePostController@store')->name('createpost');

        Route::get('/forum/post/{id}', 'Forum\Post\ShowPostController@show')->name('showpost');

        Route::post('/forum/post-del-req', 'Forum\Post\DeletePostReqController@postdelreq')->name('postdelreq');

        Route::post('/forum/report-post', 'Forum\Post\ReportPostController@reportpost')->name('reportpost');

        Route::post('/forum/react-post', 'Forum\Post\ReactPostController@reactpost')->name('reactpost');

        Route::post('/forum/create-comment', 'Forum\Comment\CreateCommentController@store')->name('createcomment');

        Route::post('/forum/browsebygame', 'Forum\ForumController@browsebygame')->name('browsebygame');


        Route::group(['middleware'=>['mod']], function(){
            Route::get('/forum/dashboard', 'Forum\Dashboard\DashboardController@index')->name('dashboard.index');
            Route::get('/forum/dashboard/pending-posts', 'Forum\Dashboard\PostApprovalController@index')->name('dashboard.pendingposts');
            
            // Route::get('/forum/dashboard/pending-posts/{id}', 'Forum\PostController@showpending')->name('dashboard.showpending');
            Route::get('/forum/dashboard/pending-posts/{id}', 'Forum\Post\ShowPostController@showpending')->name('dashboard.showpending');
            
            Route::post('/forum/dashboard/approve-post/{id}', 'Forum\Dashboard\PostApprovalController@approve')->name('dashboard.approvepost');
            Route::post('/forum/dashboard/decline-post/{id}', 'Forum\Dashboard\PostApprovalController@decline')->name('dashboard.declinepost');
            
            Route::get('/forum/dashboard/reported-posts', 'Forum\Dashboard\PostReportController@index')->name('dashboard.reportedposts');

            Route::get('/forum/dashboard/reported-posts/{id}', 'Forum\Post\ShowPostController@showreported')->name('dashboard.showreported');

            Route::post('/forum/dashboard/dismiss-post-report', 'Forum\Dashboard\PostReportController@dismiss')->name('dashboard.dismissreport');

            Route::get('/forum/dashboard/post-delete-reqs', 'Forum\Dashboard\PostDeleteController@index')->name('dashboard.postdeletereqs');

            Route::post('/forum/dashboard/delete-post', 'Forum\Dashboard\PostDeleteController@delete')->name('dashboard.deletepost');

            Route::post('/forum/dashboard/dismiss-post-delreq', 'Forum\Dashboard\PostDeleteController@dismiss')->name('dashboard.dismisspostdelreq');

            Route::get('/forum/dashboard/post-delete-reqs/{id}', 'Forum\Post\ShowPostController@showdelreqpost')->name('dashboard.showdelreqpost');

            Route::get('/forum/dashboard/report', 'Forum\ReportController@index');
            Route::get('/forum/dashboard/report-csv', 'Forum\ReportController@csv');

            Route::get('/forum/dashboard/all-users', 'Forum\Dashboard\UserController@index')->name('dashboard.allusers');

            Route::post('/forum/dashboard/muteunmute-user', 'Forum\Dashboard\UserController@muteunmute')->name('dashboard.muteunmute');

        });
    });

});
