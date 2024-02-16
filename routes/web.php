<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Routes pour l'application

$router->get('data', 'DataController@index');
$router->post('data', 'DataController@store');
$router->get('data/{id}', 'DataController@show');
$router->put('data/{id}', 'DataController@update');
$router->delete('data/{id}', 'DataController@destroy');