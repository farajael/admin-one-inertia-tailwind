<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Views
Route::middleware('auth')->group(function () {
    Route::get('/error', function () {
        return Inertia::render('views/ErrorView');
    })->name('error');
    Route::get('/forms', function () {
        return Inertia::render('views/FormsView');
    })->name('forms');
    Route::get('/home', function () {
        return Inertia::render('views/HomeView');
    })->name('dashboard');
    Route::get('/login', function () {
        return Inertia::render('views/LoginView');
    })->name('login');
    Route::get('/profile', function () {
        return Inertia::render('views/ProfileView');
    })->name('profile');
    Route::get('/responsive', function () {
        return Inertia::render('views/ResponsiveView');
    })->name('responsive');
    Route::get('/style', function () {
        return Inertia::render('views/StyleView');
    })->name('style');
    Route::get('/tables', function () {
        return Inertia::render('views/TablesView');
    })->name('tables');
    Route::get('/ui', function () {
        return Inertia::render('views/UiView');
    })->name('ui');
});

require __DIR__.'/auth.php';
