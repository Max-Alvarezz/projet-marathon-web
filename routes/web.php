<?php

use App\Http\Controllers\VueController;
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

Route::get('/', [\App\Http\Controllers\SerieController::class, 'indexNote']);
//Route::post("/login", );

Route::get('/listeSeries', [\App\Http\Controllers\SerieController::class, 'index'])->name('listeSeries');
//Route::post("/login", );


Route::get('/profil', [\App\Http\Controllers\UserController::class, 'profil']);

Route::get('/comment', [\App\Http\Controllers\SerieController::class, 'comment']);

Route::get('/series/{id}', [\App\Http\Controllers\SerieController::class, 'detail']) -> name('serie.detail');
Route::get('/profile', [\App\Http\Controllers\ProfilController::class, 'show']) ->name('base.show');
Route::get('/series/{id}', [\App\Http\Controllers\SerieController::class, 'detail'])->name('serie.detail');

Route::get('/listeSeries/{genre}', [\App\Http\Controllers\SerieController::class,'index2'])->name('tri');

Route::post('/episode/store', [\App\Http\Controllers\SerieController::class,'store'])->name('base.store');
Route::post('/series/{id}/vue', [VueController::class, 'nouveau']);

Route::post('/commentaire/store/{id}', [\App\Http\Controllers\CommentController::class,'store'])->name('commentaire.store');
Route::get('/series/view/episode/{id}', [\App\Http\Controllers\SerieController::class,'updateDBViewEpisode'])->name('vueEpisode');
//Route::get('/series/view/episode/{id}', [\App\Http\Controllers\SerieController::class,'updateDBViewSerie'])->name('vueSerie');
