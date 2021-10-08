<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeamAPIController;
use App\Http\Controllers\PlayerAPIController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;


//
// Signup and Login for the Admins
//
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

//
// Team public routes
//
Route::get('teams', [TeamAPIController::class, 'index']); // Get all teams listed
Route::get('team/{id}', [TeamAPIController::class, 'show']); // Get all teams listed
Route::get('team/id/{id}', [TeamController::class, 'getPlayersByTeamId']); // Get team data by id
Route::get('team/name/{name}', [TeamController::class, 'getPlayersByTeamName']); // Get team data by name

//
// Player public routes
//
Route::get('players', [PlayerAPIController::class, 'index']); // Get all players listed
Route::get('player/{id}', [PlayerAPIController::class, 'show']); // Get player data by id
Route::get('player/name/{name}', [PlayerController::class, 'getPlayerByPlayerName']); // Get player data by name


// Routes only available to Admin users
Route::middleware('auth:sanctum')->group( function () {
    //
    // Team secure routes
    //
    Route::resource('team', TeamAPIController::class);

    //
    // Player secure routes
    //
    Route::resource('player', PlayerAPIController::class);
});

