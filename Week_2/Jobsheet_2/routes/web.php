<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController; 
use Illuminate\Support\Facades\Route;

Route::resource('photos', PhotoController::class); 

Route::resource('photos', PhotoController::class)->only([ 
    'index', 'show' 
]); 

Route::resource('photos', PhotoController::class)->except([ 
    'create', 'store', 'update', 'destroy' 
]);

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class);

//Basic routing

Route::get('/', [WelcomeController::class,'index']);

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', [WelcomeController::class,'about']);


//Route parameters

Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId. " Komentar ke-: ".$commentId;
});

Route::get('/articles/{id}', [WelcomeController::class, 'articles']);

Route::get('/user/{name?}', function ($name=null){
    return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') { 
    return 'Nama saya '.$name; 
    }); 

Route::get('/greeting', [WelcomeController::class, 'greeting']);