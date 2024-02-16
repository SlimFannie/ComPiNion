<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Htpp\Controllers\AuthController;

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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::middleware('auth:api')->group(function() {
  Route::get('user', 'AuthController@user');
  Route::post('logout', 'AuthController@logout');
});
