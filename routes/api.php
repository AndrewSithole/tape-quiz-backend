<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('sermons', 'SermonController');
Route::apiResource('quizzes', 'QuizController');
Route::apiResource('questions', 'QuestionController');
Route::apiResource('leaderboard', 'LeaderboardEntryController');
