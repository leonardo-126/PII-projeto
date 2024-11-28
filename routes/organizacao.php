<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterOrganization;
use Inertia\Inertia;

Route::get('/RegisterOrganizacao',[RegisterOrganization::class,'create'])->name('register.org');
Route::post('/registerorganizacao/store',[RegisterOrganization::class,'store'])->name('register.org.store');



Route::get('/LoginOrganizacao', function () { //teste
    return Inertia::render('Auth/LoginOrganizacao');
})->name('LoginOrganizacao');





Route::middleware(['auth:organizacao'])->group(function(){
    Route::put('/registerorganizacao/update/{organizacao}',[RegisterOrganization::class,'update'])->name('register.org.update');
    Route::get('/dashboardOrganizacao', function () {
        return Inertia::render('DashboardOrganizacao');
        })->name('dashboard.organizacao');
});;