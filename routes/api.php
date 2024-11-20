<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Organization\OrganizationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
 
Route::post('register', [AuthenticationController::class, 'register'])->name('register.isso');
Route::post('login', [AuthenticationController::class, 'login'])->name('login.isso');

// grupo de rota destinada a organizações 
Route::resource('organizacao', OrganizationController::class)->only(['index','store','update','destroy'])->missing(function(){
    return redirect()->route('organizacao.index');

});