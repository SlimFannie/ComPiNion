<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppUserController;
use App\Http\Controllers\API\CharacterController;
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

    // Tous les indésirables
    Route::get('user/{id}/blocked', [AppUserController::class, 'blocked'])->name('blocked');

    // Relation entre deux individus
    Route::get('user/{id1}/relation/{id2}', [AppUserController::class, 'relation'])->name('relation');

    // Block
    Route::post('user/{id1}/block/{id2}', [AppUserController::class, 'block'])->name('block');
        
        // Unblock
        Route::delete('user/{id1}/unblock/{id2}', [AppUserController::class, 'unblock'])->name('unblock');

    // Befriend
    Route::post('user/{id1}/friend/{id2}', [AppUserController::class, 'befriend'])->name('befriend');

        // Unfriend
        Route::delete('user/{id1}/unfriend/{id2}', [AppUserController::class, 'unfriend'])->name('unfriend');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Modification compte
    Route::patch('user/{id}/update/prenom', [AppUserController::class, 'updateprenom'])->name('updateprenom');
    Route::patch('user/{id}/update/nom', [AppUserController::class, 'updatenom'])->name('updatenom');
    Route::patch('user/{id}/update/pseudo', [AppUserController::class, 'updatepseudo'])->name('updatepseudo');
    Route::patch('user/{id}/update/email', [AppUserController::class, 'updateemail'])->name('updateemail');
    Route::patch('user/{id}/update/merite', [AppUserController::class, 'updatemerite'])->name('updatemerite');
    Route::patch('user/{id}/update/jours', [AppUserController::class, 'updatejours'])->name('updatejours');
    Route::patch('user/{id}/update/password', [AppUserController::class, 'updatePassword'])->name('updatePassword');
    Route::patch('user/{id}/update/limite', [AppUserController::class, 'updatelimite'])->name('updatelimite');

    // Streak
    Route::post('user/{id}/update/endstreak', [AppUserController::class, 'endStreak'])->name('endStreak');
    Route::get('user/{id}/streaks', [AppUserController::class, 'getStreaks'])->name('getStreaks');
    Route::get('user/{id}/streak', [AppUserController::class, 'getStreak']);

    // Suppression du compte
    Route::delete('user/{id}/delete', [AppUserController::class, 'destroy'])->name('destroy');

// Compinions
        
    // Tous les Compinions
    Route::get('showAllCharacters', [CharacterController::class, 'showAllCharacters'])->name('showAllCharacters');

    // Le Compinion de l'usager
    Route::get('showCharacter/{id}', [CharacterController::class, 'showCharacter'])->name('showCharacter');