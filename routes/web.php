<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersoController;
use App\Http\Controllers\ListePersoController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\InviteController;



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

Route::get('/', function () {
    return view('welcome');
});

/////////////////////////USER //////////////////////////
Route::get('/inscription', [UserController::class, 'create']);
Route::post('/inscription', [UserController::class, 'store']);


/////////////////////////LOGIN //////////////////////////
Route::get('/connexion', [LoginController::class, 'index']);
Route::post('/inscriptionValide', [LoginController::class, 'show']);
Route::post('/deconnexionValide', function () {
    Auth::logout();
    return redirect('/connexion');
})->name('logout');


/////////////////////////PERSO //////////////////////////
Route::get('/perso', [PersoController::class, 'index']);
Route::post('/perso', [PersoController::class, 'show']);


/////////////////////////LISTE PERSO //////////////////////////
Route::get('/listePerso', [ListePersoController::class, 'index']);
Route::delete('listePerso/{id}', [ListePersoController::class, 'destroy']);
Route::put('listePerso/{id}', [ListePersoController::class, 'update']);
Route::post('/listePerso', [ListePersoController::class, 'create']);


/////////////////////////GROUPE //////////////////////////
Route::get('/groupe', [GroupeController::class, 'index']);
Route::post('/groupe', [GroupeController::class, 'store']);
Route::get('/catalogue', [GroupeController::class, 'show']);
Route::get('/groupe/perso', [GroupeController::class, 'create']);
Route::delete('/groupe/perso/{id}', [GroupeController::class, 'destroy']);
Route::put('/groupe/perso/{id}', [GroupeController::class, 'update']);
Route::put('/groupe/perso/add/{id}', [GroupeController::class, 'addPerso']);
Route::delete('/groupe/perso/remove/{id}', [GroupeController::class, 'removePerso']);
Route::post('/catalogue', [GroupeController::class, 'filtre']);
Route::post('/catalogue/name', [GroupeController::class, 'filtreName']);
Route::put('/catalogue/{id}', [InviteController::class, 'groupe']);