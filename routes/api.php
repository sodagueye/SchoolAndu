<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('eleve/register' , [EleveController::class , 'eleve_register']);
Route::get('listes_eleves' , [EleveController::class , 'listes_eleves']);
Route::get('eleve/{id}' , [EleveController::class , 'eleve']);
Route::put('eleve/{id}' , [EleveController::class , 'update_eleve']);
Route::delete('eleve/{id}' , [EleveController::class , 'delete_eleve']);

Route::post('parent/connexion' , [EleveController::class , 'connexion_parent']);
Route::post('parent/deconnexion' , [EleveController::class , 'deconnexion_parent']);
