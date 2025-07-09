<?php

use App\Http\Controllers\api\v1\postApiController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
    Route::apiResource("post", postApiController::class);
});

/*
Route::post('/blog', [PostController::class, 'create']);
Route::delete('/blog/{id}', [PostController::class, 'delete']);

Route::post('/comments', [CommentController::class, 'create']);

Route::post('/tags', [TagController::class, 'create']); */