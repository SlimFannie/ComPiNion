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
    Route::get('/',
    [UsersController::class, 'index'])->name('users.accueil');

    // Ajouter un nouvel utilisateur
    Route::post('/users/store',
    [UsersController::class, 'store'])->name('users.store');

    // Supprimer un utilisateur
    Route::delete('/users/{id}',
    [UsersController::class, 'destroy'])->name('users.destroy');




//Routes pour l'application
    $router->get('data', 'DataController@index');
    $router->post('data', 'DataController@store');
    $router->get('data/{id}', 'DataController@show');
    $router->put('data/{id}', 'DataController@update');
    $router->delete('data/{id}', 'DataController@destroy');

