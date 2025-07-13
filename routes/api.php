<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\postApiController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
    Route::apiResource("post", postApiController::class)->middleware("auth:api");

    Route::prefix("auth")->group(function () {
        Route::post("login", [AuthController::class, "login"]);

        // Only if I am authenticated with jwt(Authorization Header)

        Route::middleware("auth:api")->group(function () {
            Route::post("refresh", [AuthController::class, "refresh"]);
            Route::get("me", [AuthController::class, "me"]);
            Route::post("logout", [AuthController::class, "logout"]);
        });
    });
});

/*
Route::post('/blog', [PostController::class, 'create']);
Route::delete('/blog/{id}', [PostController::class, 'delete']);

Route::post('/comments', [CommentController::class, 'create']);

Route::post('/tags', [TagController::class, 'create']); */