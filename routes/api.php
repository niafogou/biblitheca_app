<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\LivreController;



Route::get('/categorie', [CategorieController::class, 'getAll']);
Route::post('/categorie/create', [CategorieController::class, 'create']);
Route::post('/categorie/update/{id}', [CategorieController::class, 'update']);
Route::delete('/categorie/delete/{id}', [CategorieController::class, 'delete']);



Route::get('/auteur', [AuteurController::class, 'getAll']);
Route::post('auteur/create', [AuteurController::class, 'create']);
Route::post('/auteur/update/{id}', [AuteurController::class, 'update']);
Route::delete('/auteur/delete/{id}', [AuteurController::class, 'delete']);



Route::get('/livre', [LivreController::class, 'getAll']);
Route::post('/livre/create', [LivreController::class, 'create']);
Route::post('/livre/update/{id}', [LivreController::class, 'update']);
Route::delete('/livre/delete/{id}', [LivreController::class, 'delete']);


Route::get('/api/test', function () {
    return response()->json([
        'message' => 'API Laravel fonctionne correctement'
    ]);
});