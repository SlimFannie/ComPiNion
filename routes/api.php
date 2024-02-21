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
Route::post('register', 'API\AuthController@register');
//Login
Route::post('login', 'API\AuthController@login');

Route::middleware('auth:api')->group(function() {
  //Usager logged in
  Route::get('/compinion/{id}', 'API\AuthController@user');
  //Tous les usagers
  Route::get('/compinion/{id}/leaderboard', 'API\AppUserController@users');
  //Logout
  Route::post('logout', 'API\AuthController@logout');
  //Modification compte
  Route::patch('/compinion/{id}/modification/', 'API\AppUserController@update');
  //Suppression du compte
  Route::delete('/compinion/{id}/suppression/', 'API\AppUserController@destroy');
});
