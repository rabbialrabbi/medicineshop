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
        Route::get('/', 'BrandController@index')->name('show.brand');
        Route::post('/', 'BrandController@store')->name('add.brand');
        Route::delete('/{brand}', 'BrandController@destroy')->name('destroy.brand');
    });
    Route::group(['prefix'=>'/item-type'],function (){
        Route::get('/', 'ItemTypeController@index')->name('show.itemType');
        Route::post('/', 'ItemTypeController@store')->name('add.itemType');
        Route::delete('/{itemType}', 'ItemTypeController@destroy')->name('destroy.itemType');
    });
    Route::group(['prefix'=>'/item'],function (){
        Route::get('/', 'ItemController@index')->name('show.item');
        Route::post('/', 'ItemController@store')->name('add.item');
        Route::delete('/{item}', 'ItemController@destroy')->name('destroy.item');
    });
    Route::group(['prefix'=>'/mr'],function (){
        Route::get('/', 'MRController@index')->name('show.mr');
        Route::post('/', 'MRController@store')->name('add.mr');
        Route::delete('/{mr}', 'MRController@destroy')->name('destroy.mr');
    });

});


/*----------------Error Handling-----------------*/
Route::get('not-verified','ErrorController@notVerified')->name('not.verified')->middleware('auth');
Route::get('not-authorized','ErrorController@notAuthorized')->name('not.authorized')->middleware('auth');




Auth::routes();
