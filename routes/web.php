<?php

use App\Item;
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
Route::get('/','HomeController@index')->name('home.view');




Route::post('/message','MessageController@store')->name('message.store');
Route::get('/verify','Auth\RegisterController@validateUser')->name('user.validation');


Route::group(['middleware'=>'auth'], function(){

    Route::group(['middleware'=>'customer'],function (){
        Route::post('/order','OrderController@store')->name('order.store');
//        Route::resource('order','OrderController');

        Route::get('cart/{item}', 'CartController@index')->name('cart.show');
        Route::get('cart/delete/{item}', 'CartController@destroy')->name('cart.delete');
        Route::get('cart/clear/all','CartController@clear')->name('cart.clear');
    });

    Route::group(['middleware'=>'admin'], function(){

        Route::get('/admin', 'AdminController@index');
        Route::delete('/admin/{user}', 'AdminController@destroy')->name('admin.delete');
        Route::get('/message','MessageController@index')->name('message.index');
        Route::get('/order','OrderController@index')->name('order.index');
        Route::get('/order/{order}','OrderController@show')->name('order.show');
        Route::get('/order/print/{order}','OrderController@print')->name('order.print');

        Route::group(['prefix'=>'/generic'],function (){
            Route::get('/create', 'GenericController@create')->name('generic.create');
            Route::post('/', 'GenericController@store')->name('generic.store');
            Route::patch('/{generic}', 'GenericController@update')->name('generic.update');
            Route::delete('/{generic}', 'GenericController@destroy')->name('generic.destroy');
            Route::get('/pdf', 'GenericController@pdf')->name('generic.pdf');
        });
        Route::group(['prefix'=>'/brand'],function (){
            Route::get('/create', 'BrandController@create')->name('brand.create');
            Route::post('/', 'BrandController@store')->name('brand.store');
            Route::patch('/{brand}', 'BrandController@update')->name('brand.update');
            Route::delete('/{brand}', 'BrandController@destroy')->name('brand.destroy');
            Route::get('/pdf', 'BrandController@pdf')->name('brand.pdf');
        });
        Route::group(['prefix'=>'/item-type'],function (){
            Route::get('/create', 'ItemTypeController@create')->name('itemType.create');
            Route::post('/', 'ItemTypeController@store')->name('itemType.store');
            Route::patch('/{itemType}', 'ItemTypeController@update')->name('itemType.update');
            Route::delete('/{itemType}', 'ItemTypeController@destroy')->name('itemType.destroy');
            Route::get('/pdf', 'ItemTypeController@pdf')->name('itemType.pdf');
        });
        Route::group(['prefix'=>'/item'],function (){
            Route::get('/', 'ItemController@index')->name('item.index');
            Route::get('/create', 'ItemController@create')->name('item.create');
            Route::get('/{item}', 'ItemController@show')->name('item.show');
            Route::get('/{item}/edit', 'ItemController@edit')->name('item.edit');
            Route::post('/', 'ItemController@store')->name('item.store');
            Route::patch('/{item}', 'ItemController@update')->name('item.update');
            Route::delete('/{item}', 'ItemController@destroy')->name('item.destroy');
        });
        Route::group(['prefix'=>'/mr'],function (){
            Route::get('/', 'MRController@index')->name('mr.index');
            Route::get('/create', 'MRController@create')->name('mr.create');
            Route::get('/{mr}', 'MRController@show')->name('mr.show');
            Route::get('/{mr}/edit', 'MRController@edit')->name('mr.edit');
            Route::post('/', 'MRController@store')->name('mr.store');
            Route::patch('/{mr}', 'MRController@update')->name('mr.update');
            Route::delete('/{mr}', 'MRController@destroy')->name('mr.destroy');
        });

    });
});




/*----------------Error Handling-----------------*/
Route::get('not-verified','ErrorController@notVerified')->name('not.verified')->middleware('auth');
Route::get('not-authorized','ErrorController@notAuthorized')->name('not.authorized')->middleware('auth');






Auth::routes();
