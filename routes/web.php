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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/home',function(){
		return view('backend.home');
	});

	Route::get('/sitebackend',"PageController@index");//ASU Adminpanel
	//pages
	Route::get('/create/page',"PageController@create");
	Route::post('/create/page',"PageController@store");
	Route::get('/show/allpages',"PageController@show");
	Route::get('/show/allpages/{id}/edit/',"PageController@edit");
	Route::PATCH("/page/update","PageController@update")->name("update");
	Route::get('/show/allpages/{id}/delete/','PageController@destroy')->name('delete');
	
});