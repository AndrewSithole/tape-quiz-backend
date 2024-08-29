<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('sermons', 'SermonController');
Route::apiResource('quizzes', 'QuizController');
Route::apiResource('questions', QuestionController::class);
Route::apiResource('leaderboard', 'LeaderboardEntryController');
