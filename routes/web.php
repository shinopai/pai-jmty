<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// root
Route::get('/', [HomeController::class, 'index'] )->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
