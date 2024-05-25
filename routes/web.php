<?php

use App\Http\Controllers\ProfileController;
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
        Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('admin.messages.edit');
    });

});

require __DIR__.'/auth.php';
