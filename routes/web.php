<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StandController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(RegisterController::class)->group(function()
{
    Route::get('/register','inscription')->name('inscription');
    Route::post('/register','adduser');
});


Route::controller(StandController::class)->group(function()
{
    Route::get('/register/stand','inscription')->name('inscriptionStand');
    Route::post('/register/stand','addStand');
    
});
Route::controller(LoginController::class)->group(function()
{
    Route::get('/login','connexion')->name('connexion');
    Route::get('/logout','deconnexion')->name('deconnexion');
    Route::post('/login','connecter');
});

Route::get('/dashboard',[DasboardController::class,'dash'])->name("dashboard");
