<?php

use Illuminate\Support\Facades\Route;

Route::middleware('token')->group(function () {
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('likes', LikeController::class);
    Route::apiResource('comments', CommentController::class);
});
