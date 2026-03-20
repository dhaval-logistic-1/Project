<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::resource('users', UserController::class);


Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/users',  'getUsers')->name('users.getUsers');

    Route::get('/createUser', 'create')->name('users.create');
    Route::post('/createUser', 'store')->name('users.store');
   

    Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    Route::get('/users/{id}/edit', 'edit')->name('users.edit');
    Route::put('/users/{id}', 'update')->name('users.update');

});


require __DIR__.'/auth.php';
