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



//api
Route::get('/api','api@index');