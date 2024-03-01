<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routes pour l'interface web
/*----------------------- Users ------------------------*/
    Route::get('Compinion',
    [UsersController::class, 'index'])->name('users.accueil')->middleware('auth');

    // Ajouter un nouvel utilisateur
    Route::post('/users/store',
    [UsersController::class, 'store'])->name('users.store')->middleware('auth');

    // Supprimer un utilisateur
    Route::delete('/users/{id}',
    [UsersController::class, 'destroy'])->name('users.destroy')->middleware('auth');

    //Afficher le formulaire de connexion
    Route::get('/', 
    [UsersController::class, 'formConnexion'])->name('login');

    //Connexion
    Route::post('connexion',
    [UsersController::class, 'connexion'])->name('users.connexion');

    //Deconnexion
    Route::get('logout', [UsersController::class, 'logout'])->name('logout');

