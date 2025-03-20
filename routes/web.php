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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RankingsController;


Route::get('/', function () {
    return view('welcome');
});

// middleware for the fcking admin
//ang Admin Middleware kay naka register sa bootstrap/app.php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('colleges', CollegeController::class);
    Route::resource('partylists', PartylistController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('candidates', CandidateController::class);
    Route::resource('voters', VoterController::class);
    Route::resource('casted_votes', CastedVoteController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
    Route::get('/rankings', [RankingsController::class, 'index'])->name('rankings.index');
    Route::post('/voters/{voter}/reset-passkey', [VoterController::class, 'resetPasskey'])->name('voters.reset-passkey');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
