<?php

use App\Http\Controllers\AbilityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::resource('pokemons', PokemonController::class)->only([
    'index', 'show'
]);
Route::resource('locations', LocationController::class)->only([
    'index', 'show'
]);
Route::resource('images', ImageController::class)->only([
    'index', 'show'
]);
Route::resource('abilities', AbilityController::class)->only([
    'index', 'show'
]);
Route::get('abilities/pokemon/{pokemon}', [AbilityController::class, 'byPokemon'])->name('ailities_by_pokemon');

Route::resource('areas', AreaController::class)->only([
    'index', 'show'
]);
