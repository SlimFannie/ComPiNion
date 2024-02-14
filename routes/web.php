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

Route::get('/',
[UsersController::class, 'index'])->name('users.accueil');

/*----------------------- Users ------------------------*/

// Ajouter un nouvel utilisateur
Route::post('/users/store',
[UsersController::class, 'store'])->name('users.store');

// Supprimer un utilisateur
Route::delete('/users/{id}',
[UsersController::class, 'destroy'])->name('users.destroy');
