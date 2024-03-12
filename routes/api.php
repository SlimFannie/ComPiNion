<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppUserController;
use App\Http\Controllers\FtpController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('ftp/upload', [FtpController::class, 'uploadToFtp']);

// Création de compte
Route::post('register', [AuthController::class, 'register'])->name('register');

// Login
Route::post('login', [AuthController::class, 'login'])->name('login');

    // Usager logged in
    Route::get('user/{id}', [AuthController::class, 'user'])->name('user');
    
    // Tous les usagers
    Route::get('users/{id}', [AppUserController::class, 'users'])->name('users');

    // Tous les amis
    Route::get('user/{id}/amis', [AppUserController::class, 'amis'])->name('amis');

    // Block
    Route::post('user/{id1}/block/{id2}', [AppUserController::class, 'block'])->name('block');
        
        // Unblock
        Route::delete('user/{id1}/unblock/{id2}', [AppUserController::class, 'unblock'])->name('unblock');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Modification compte
    Route::patch('compinion/{id}', [AppUserController::class, 'update'])->name('update');

    // Suppression du compte
    Route::delete('compinion/{id}', [AppUserController::class, 'destroy'])->name('destroy');

// Characters
    
    //Envoyer la liste des personnages pour l'écran de selection 
        
    // Tous les usagers
    Route::get('showAllCharacters', [AppUserController::class, 'showAllCharacters'])->name('showAllCharacters');