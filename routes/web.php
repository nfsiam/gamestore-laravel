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
Route::get('/enduser/logout','EnduserController@enduserLogout');

Route::get('/publisher/report.html','PublisherController@publisherReport')->name('pubReport');
Route::get('/publisher/store.html','PublisherController@publisherStore')->name('pubStore');
Route::get('/publisher/library.html','PublisherController@publisherLibrary')->name('pubLibrary');
Route::get('/publisher/myprofile.html','PublisherController@publisherMyprofile')->name('pubCommunity');
Route::get('/publisher/publish.html','PublisherController@publisherPublish')->name('pubPublish');
Route::post('/publisher/publish.html','PublisherController@publisherUpload')->name('pubPublishPost');
Route::get('/publisher/logout.html','PublisherController@publisherLogout')->name('pubPublish');

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

Route::middleware(['auth'])->group(function(){

    Route::get('/forum', 'Forum\ForumController@index')->name('forum.index');

    Route::group(['middleware'=>['mod']], function(){
        Route::get('/forum/dashboard', 'Forum\ForumDashboardController@index')->name('forumdashboard.index');
	});

    Route::get('/chat', 'Chat\ChatController@index')->name('chat.index');
    Route::get('/chat/gossiproom', 'Chat\ChatController@gossiproom')->name('chat.gossiproom');
    Route::get('/chat/{convid}','Chat\ChatController@conversation')->name('chat.conversation');

});


//admin part
Route::get('/admin','admin\adminController@index');
Route::get('/admin/users','admin\adminController@users');

Route::group(['middleware'=>['permissionrating']], function(){

Route::get('/admin/ratings','admin\adminController@ratings');
Route::get('/admin/showratings','admin\adminController@showratings');
Route::post('/admin/ratings','admin\adminController@updateratingpost');
Route::post('/admin/searchshowrating','admin\adminController@searchshowratings');

});

Route::group(['middleware'=>['permissiongamechange']], function(){

   Route::post('/admin/gamedelete','admin\adminController@gamedeletepost');
 });



Route::get('/admin/gamelist','admin\adminController@gamelist');
Route::post('/admin/gamelist','admin\adminController@gamelistpost');
Route::get('/admin/searchgame','admin\adminController@searchgame');
Route::post('/admin/search','admin\adminController@searchgamepost');

Route::group(['middleware'=>['permissionrecharge']], function(){
    
    Route::get('/admin/userwalet','admin\adminController@userwalet');//view 
    Route::post('/admin/userwalet','admin\adminController@userwaletPost');// form bonus
    Route::get('/admin/showuserwalet','admin\adminController@showuserwalet'); //ajax req get
    Route::post('/admin/searchuserwalet','admin\adminController@searchuserwalet'); //ajax req get
    
});

Route::post('/admin/userwaletexcel','admin\adminController@userwaletexcel');

//super admin part
Route::get('/sadmin','super\superadminController@index');
Route::get('/sadmin/permissionrating','super\superadminController@permissionrating');
Route::post('/sadmin/permissionrating','super\superadminController@permissionratingPost');

Route::get('/sadmin/permissiongamedelete','super\superadminController@permissiongamedelete');
Route::post('/sadmin/permissiongamedelete','super\superadminController@permissiongamedeletePost');

Route::get('/sadmin/permissionrecharge','super\superadminController@permissionrecharge');
Route::post('/sadmin/permissionrecharge','super\superadminController@permissionrechargePost');
