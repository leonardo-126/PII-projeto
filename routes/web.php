<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/LoginOrganizacao', function () { //teste
    return Inertia::render('Auth/LoginOrganizacao');
})->name('LoginOrganizacao');

Route::get('/RegisterOrganizacao', function () { //teste
    return Inertia::render('Auth/RegisterOrganizacao');
})->name('RegisterOrganizacao');

Route::get('/DenunciarIncidente', function () { //teste
    return Inertia::render('DenunciarIncidente');
})->name('DenunciarIncidente');
Route::get('/dashboard', function () {
return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardOrganizacao', function () {
return Inertia::render('DashboardOrganizacao');
})->middleware(['auth', 'verified'])->name('dashboardOrganizacao');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
