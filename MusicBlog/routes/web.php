<?php
use App\Http\Controllers\SongController;
use App\Http\Controllers\LandingController;

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/', [LandingController::class, 'index']);
Route::post('/like', [LandingController::class,'like']);

Route::get('/favoritos', [LandingController::class, 'likeList'])->middleware('auth');
// Route::group(['middleware' => ['role:admin']], function () {
Route::resource('songs', App\Http\Controllers\SongController::class);
Route::resource('albums', App\Http\Controllers\AlbumController::class);
Route::resource('singers', App\Http\Controllers\SingerController::class);
Route::resource('genders', App\Http\Controllers\GenderController::class);
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
