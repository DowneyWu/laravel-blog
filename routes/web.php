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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
    Route::resource('article', 'ArticleController');
    Route::any('login', 'LoginController@login');
    Route::any('register', 'LoginController@register');
    Route::post('store', 'LoginController@store');
});


Route::group(['middleware' => 'test'], function(){
   Route::get('test/index', 'TestController@index');
});

Route::get('test/refuse', ['as' => 'refuse', function(){
    return '18岁以下男子禁止访问';
}]);

//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});


//Auth::routes();
