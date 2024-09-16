<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json(['message' => 'Welcome to the API']);
    });
    Route::prefix('quiz')->group(function () {
        Route::get('/featured', [QuizController::class, 'featured']);

    });
    require __DIR__.'/auth.php';
});
