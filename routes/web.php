<?php


Route::get('/', function () {
	return Theme::view('index');
})->middleware('theme:default,layout');

Route::get('hello', 'HomeController@getIndex');

Route::group(['middleware'=>'theme:default,layout'], function() {
    Route::get('somewhere', 'BaseController@getIndex');
});
