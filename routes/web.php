<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/', 'HomeController@index')->name('home');
Route::get('/story/{story}/{title?}', 'HomeController@show')->name('stories.show');
Route::get('+/{term}', 'TermPostController@index')->name('termPost.index')->where(['subTerm' => 'term=[^=\/]+']);
Route::get('+/{term}/term={subTerm}', 'TermPostController@index')->name('termPost.subIndex');

Route::get('+/{term}/{post}/{title?}', 'TermPostController@show')->name('termPost.show')->where(['post' => '[^=\/]+']);

Route::get('/about-us', 'HomeController@aboutUs')->name('about.us');
Route::get('/tst', function(Request $request){
    dd($request->header());
});
