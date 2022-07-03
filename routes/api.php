<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LikeController;
use Illuminate\Support\Facades\Auth;

// get current user id
Route::get('/current_user_id', function(){
    if(Auth::check()){
        return Auth::id();
    }else{
        return 'not logged in';
    }
});

// get like number
Route::get('/items/{item}/like_number', [LikeController::class, 'getLikeNumber'])->middleware('api');

// like item
Route::post('/users/{user}/items/{item}/like', [LikeController::class, 'likeItem'])->middleware('api');

// unlike item
Route::post('/users/{user}/items/{item}/unlike', [LikeController::class, 'unlikeItem'])->middleware('api');

// check if current user liked this item
Route::get('/users/{user}/items/{item}/check', [LikeController::class, 'checkLiked'])->middleware('api');
