<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StandController;
use App\Http\Middleware\CheckIfActivated;
use App\Models\Stand;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\select;

Route::controller(RegisterController::class)->group(function()
{
    Route::get('/register','inscription')->name('inscription');
    Route::post('/register','adduser');
});
Route::get("/compteInactif",function()
{
    return(view("patiente"));
})->name("inactif");
Route::controller(LoginController::class)->group(function()
{
    Route::get('/login','connexion')->name('login');
    Route::get('/logout','deconnexion')->name('deconnexion');
    Route::post('/login','connecter');
});

Route::middleware(['auth',CheckIfActivated::class])->group(function(){

    Route::controller(StandController::class)->group(function()
{
    Route::get('/register/stand','inscription')->name('inscriptionStand');
    Route::post('/register/stand','addStand');
});
Route::controller(DasboardController::class)->group( function()
{
    Route::get('/dashboard','dash')->name("dashboard");
    Route::get('/dashboard-stand/{id}',"detailstand")->name("detailstand");
});
Route::controller(ProduitsController::class)->group( function()
{
    Route::get('/dashboard-stand/{id}/addproduit',"formaddproduit")->name("addproduit");
    Route::post('/dashboard-stand/{id}/addproduit',"addproduit");
    Route::get('/dashboard-stand/{id}/addproduit/{produit}',"modifieproduit")->name("modifieproduit");
    Route::post('/dashboard-stand/{id}/addproduit/{produit}',"updateprod");
    Route::get('/dashboard-stand/{id}/del/{produit}',"delprod")->name("supprimerproduit");    
});

});
