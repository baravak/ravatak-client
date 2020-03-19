<?php

use Illuminate\Support\Facades\Route;

Route::resource('stories', 'StoryController', ['except' => 'show']);
Route::resource('posts', 'PostController', ['except' => 'show']);
