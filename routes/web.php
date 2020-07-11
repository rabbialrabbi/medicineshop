<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::view('/','pages.front')->name('home.view');


Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', 'AdminController@index');

    Route::group(['prefix'=>'/generic'],function (){
        Route::get('/', 'GenericController@index')->name('show.generic');
        Route::post('/', 'GenericController@store')->name('add.generic');
        Route::delete('/{generic}', 'GenericController@destroy')->name('destroy.generic');
    });
    Route::group(['prefix'=>'/brand'],function (){
        Route::get('/', 'AdminController@brand');
        Route::post('/', 'AdminController@storeBrand');
        Route::delete('/{Brand}', 'AdminController@destroyBrand');
    });
    Route::group(['prefix'=>'/item-type'],function (){
        Route::get('/', 'AdminController@itemType');
        Route::post('/', 'AdminController@storeItemType');
        Route::delete('/{ItemType}', 'AdminController@destroyItemType');
    });
    Route::group(['prefix'=>'/item'],function (){
        Route::get('/', 'AdminController@item');
        Route::post('/', 'AdminController@storeItem');
        Route::delete('/{Item}', 'AdminController@destroyItem');
    });
    Route::group(['prefix'=>'/mr'],function (){
        Route::get('/', 'AdminController@mr');
        Route::post('/', 'AdminController@storeMr');
        Route::delete('/{Mr}', 'AdminController@destroyMr');
    });

//    Route::get('/admin', 'AdminController@index');
//    Route::get('/admin', 'AdminController@index');
//    Route::get('/admin', 'AdminController@index');

});


/*----------------Error Handling-----------------*/
Route::get('not-verified','ErrorController@notVerified')->name('not.verified')->middleware('auth');
Route::get('not-authorized','ErrorController@notAuthorized')->name('not.authorized')->middleware('auth');




Auth::routes();
