<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\CastedVoteController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('colleges', CollegeController::class);


Route::resource('partylists', PartylistController::class);


Route::resource('organizations', OrganizationController::class);


Route::resource('positions', PositionController::class);


Route::resource('candidates', CandidateController::class);


Route::resource('voters', VoterController::class);


Route::resource('casted-votes', CastedVoteController::class);
