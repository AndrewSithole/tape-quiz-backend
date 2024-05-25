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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix'=>'admin'], function () {
        Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/messages/create', [MessageController::class, 'create'])->name('admin.messages.create');
        Route::post('/messages/store', [MessageController::class, 'store'])->name('admin.messages.store');
        Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->name('admin.messages.edit');
        Route::put('/messages/{message}/update', [MessageController::class, 'update'])->name('admin.messages.update');
        Route::put('/messages/{message}/quiz/create', [MessageController::class, 'createQuiz'])->name('admin.messages.createQuiz');
        Route::put('/quiz', [QuizController::class, 'index'])->name('admin.quiz.index');
        Route::put('/quiz/{quiz}', [QuizController::class, 'read'])->name('admin.quiz.read');
        Route::put('/quiz/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quiz.edit');
        Route::put('/quiz/{quiz}/update', [QuizController::class, 'update'])->name('admin.quiz.update');
        Route::put('/quiz/{quiz}/delete', [QuizController::class, 'delete'])->name('admin.quiz.delete');
    });

});

require __DIR__.'/auth.php';
