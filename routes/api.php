<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::post('/auth','Api\AuthController@login');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->middleware('auth:sanctum')->group(function (){
    Route::apiResource('projects','ProjectController');
    Route::apiResource('tasks','TaskController')->except(['index','show']);
});
