<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::resource('posts', PostController::class);
Route::post('posts/{id}/restore',[PostController::class,'restore'])->name('posts.restore');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function(){
    return view('home');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){       
    return view('contact');
});

