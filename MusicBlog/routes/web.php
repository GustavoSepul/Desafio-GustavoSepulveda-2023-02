<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('canciones', App\Http\Controllers\CancioneController::class);
Route::resource('albumes', App\Http\Controllers\AlbumeController::class);
Route::resource('artistas', App\Http\Controllers\ArtistaController::class);
Route::resource('generos', App\Http\Controllers\GeneroController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
