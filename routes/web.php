<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

// root
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// item
Route::resource('users.items', ItemController::class)->except('index');

// search
Route::get('/search', [ItemController::class, 'search'])->name('items.search');

// all items per category
Route::get('/categories/{category}', [ItemController::class, 'showAllPerCategory'])->name('items.category');

// user profile
Route::get('/profiles/{user}', [UserController::class, 'showProfile'])->name('users.profile');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// measures for mixed content
if (config('app.env') === 'production' or config('app.env') === 'heroku') {
    URL::forceScheme('https');
}
