<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\CastedVoteController;

// Default Breeze Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Add Back Your Admin Routes with Middleware Protection
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('colleges', CollegeController::class);
    Route::resource('partylists', PartylistController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('candidates', CandidateController::class);
    Route::resource('voters', VoterController::class);
    Route::resource('casted-votes', CastedVoteController::class);
});

require __DIR__.'/auth.php';
