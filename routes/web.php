<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix'=>'admin'], function () {
        //Message routes
        Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/messages/create', [MessageController::class, 'create'])->name('admin.messages.create');
        Route::post('/messages/store', [MessageController::class, 'store'])->name('admin.messages.store');
        Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->name('admin.messages.edit');
        Route::put('/messages/{message}/update', [MessageController::class, 'update'])->name('admin.messages.update');
        Route::get('/messages/{message}/quiz/create', [QuizController::class, 'create'])->name('admin.messages.quiz.create');

        //Quiz routes
        Route::get('/quiz', [QuizController::class, 'index'])->name('admin.quiz.index');
        Route::post('/quiz/store', [QuizController::class, 'store'])->name('admin.quiz.store');
        Route::get('/quiz/{quiz}', [QuizController::class, 'read'])->name('admin.quiz.read');
        Route::get('/quiz/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quiz.edit');
        Route::put('/quiz/{quiz}/update', [QuizController::class, 'update'])->name('admin.quiz.update');
        Route::delete('/quiz/{quiz}/delete', [QuizController::class, 'delete'])->name('admin.quiz.delete');
    });

});

require __DIR__.'/auth.php';
