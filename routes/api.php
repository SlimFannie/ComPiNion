<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppUserController;

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

//Création compte
Route::post('register', [AuthController::class, 'register']);
//Login
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {

  //Usager logged in
  Route::get('/compinion/{id}', [AuthController::class, 'user']);
  //Tous les usagers
  Route::get('/compinion/{id}', [AppUserController::class, 'users']);
  //Logout
  Route::post('logout', [AuthController::class, 'logout']);
  //Modification compte
  Route::patch('/compinion/{id}', [AppUserController::class, 'update']);
  //Suppression du compte
  Route::delete('/compinion/{id}', [AppUserController::class, 'destroy']);

});
