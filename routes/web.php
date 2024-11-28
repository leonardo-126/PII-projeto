<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Auth\RegisterOrganization;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


<<<<<<< HEAD
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
=======

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard.users');
    Route::get('/DenunciarIncidente', function () { //teste
 
        return Inertia::render('DenunciarIncidente',[
            'auth'=> Auth::id()
        ]);
    })->name('DenunciarIncidente');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:org'])->group(function () {
  
    Route::put('/registerorganizacao/update/{organizacao}',[RegisterOrganization::class,'update'])->name('register.org.update');
    Route::get('/dashboardOrganizacao', function () {
        return Inertia::render('DashboardOrganizacao');
        })->name('dashboard.organizacao');
>>>>>>> teste
});

Route::post('regist', [AuthenticationController::class, 'register'])->name('register.isso');
Route::post('log', [AuthenticationController::class, 'login'])->name('login.isso');






//json organ

Route::get('/organizacaojson/list', [OrganizationController::class,'organizationJson'])->name('organizacao.json');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
