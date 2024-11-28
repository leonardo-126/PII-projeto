<?php

use App\Http\Controllers\Auth\RegisterOrganization;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
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
Route::middleware(['auth:users'])->group(function(){

});

Route::middleware(['auth:organizacao'])->group(function(){
    Route::put('/registerorganizacao/update/{organizacao}',[RegisterOrganization::class,'update'])->name('register.org.update');
    Route::get('/dashboardOrganizacao', function () {
        return Inertia::render('DashboardOrganizacao');
        })->name('dashboard.organizacao');
});;
Route::get('/RegisterOrganizacao',[RegisterOrganization::class,'create'])->name('register.org');
Route::post('/registerorganizacao/store',[RegisterOrganization::class,'store'])->name('register.org.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/LoginOrganizacao', function () { //teste
    return Inertia::render('Auth/LoginOrganizacao');
})->name('LoginOrganizacao');



Route::get('/DenunciarIncidente', function () { //teste
    return Inertia::render('DenunciarIncidente');
})->name('DenunciarIncidente');

//json organ

Route::get('/organizacaojson/list', [OrganizationController::class,'organizationJson'])->name('organizacao.json');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
