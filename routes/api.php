<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Notificacao\NotificacaoController;
use App\Http\Controllers\Organization\OrganizationController;
use Inertia\Inertia;

Route::get('/dashboard', function () {

})->middleware('auth:api');
 


// grupo de rota destinada a organizações 
Route::resource('organizacao', OrganizationController::class)->only(['index','store','update','destroy'])->missing(function(){
    return redirect()->route('organizacao.index');

});
Route::resource('notificacao', NotificacaoController::class)->only(['index','store','update', 'destroy'])->missing(function(){
    return redirect()->route('notificacao.index');
});