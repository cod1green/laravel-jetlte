<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

Route::post('/contact', [ContactController::class, 'sendContact']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
