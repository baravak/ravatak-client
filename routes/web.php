<?php

use Illuminate\Support\Facades\Route;
Route::get('/', 'HomeController@index')->name('home');
Route::get('/story/{story}', 'HomeController@show')->name('stories.show');
Route::get('/{term}/{subTerm?}', 'TermPostController@index')->name('termPost.index');
Route::get('/{term}/+/{post}', 'TermPostController@show')->name('termPost.show');
