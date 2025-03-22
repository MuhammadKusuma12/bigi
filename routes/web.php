<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IllustrationController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminConfirm;
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

// Illustration Routes
Route::get('/illustration', [IllustrationController::class, 'index'])->name('illustration.index');
Route::get('/illustration/create', [IllustrationController::class, 'create'])->name('illustration.create')->middleware('auth');;
Route::post('/illustration', [IllustrationController::class, 'store'])->name('illustration.store');

// Art Routes
Route::post('/art', [ArtController::class, 'store'])->name('art.store');

// Admin Routes
Route::middleware(['admin-middleware'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
