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
         Route::get('/login', 'centralController@index');  
         Route::post('/login', 'centralController@verify'); 
        
     Route::middleware(['session'])->group(function()
        
        {
         Route::group(['middleware'=>['type']], function()
        {   
        Route::get('/gamelist', 'centralController@gamelist')->name('gamelist');
        Route::get('/userlist', 'centralController@userlist');
        Route::get('/profile', 'centralController@profile');
        Route::post('/profileUpdate', 'centralController@profileUpdate');

        Route::post('/addtocart', 'centralController@addtocart');
        Route::post('/makefriend', 'centralController@makefriend');

        Route::get('/transactions', 'centralController@transactions');
    });
});
