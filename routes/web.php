<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IllustrationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landing');

Route::get('/dashboard', function () {
    $users = App\Models\User::all();
    return Inertia::render('Dashboard', ['users'=>$users]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function(){
    sleep(2);
    return Inertia::render('About');
})->name('about');

Route::get('/illustration', [IllustrationController::class, 'index'])->name('illustration.index');
Route::get('/illustration/create', [IllustrationController::class, 'create'])->name('illustration.create');
Route::post('/illustration', [IllustrationController::class, 'store'])->name('illustration.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
