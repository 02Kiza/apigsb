<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');
Route::post('/visiteur/initpwds',[VisiteurController::class, "initPasswords"]);
Route::post('/visiteur/login',[VisiteurController::class, "login"]);
Route::get('/visiteur/logout',[VisiteurController::class, "logout"]);
Route::post('/visiteur/unauthorized',[VisiteurController::class, "unauthorized"]);
Route::get('/frais/{idFrais}', [FraisController::class, 'DetailsFrais']);
Route::post('/frais/ajout', [FraisController::class, 'AjouterFrais']);
Route::post('/frais/modif/{idFrais}', [FraisController::class, 'ModifierFrais']);
Route::delete('/frais/suppr', [FraisController::class, 'SupprimerFrais'])->middleware('auth:sanctum');
Route::get('/frais/liste/{idVisiteur}', [FraisController::class, 'ListerFrais'])->middleware('auth:sanctum');



