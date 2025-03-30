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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RankingsController;
use App\Http\Controllers\EmailLogController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\MaintenanceController;

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
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generatePDF'])->name('reports.generate');
    Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
    Route::get('/rankings', [RankingsController::class, 'index'])->name('rankings.index');

    Route::resource('voting-records', VotingRecordController::class)->only(['index', 'show']);
    
    Route::get('/email-logs', [EmailLogController::class, 'index'])->name('email-logs.index');
    Route::post('/maintenance/toggle', [MaintenanceController::class, 'toggle'])->name('maintenance.toggle');
    Route::post('/maintenance/message', [MaintenanceController::class, 'updateMessage'])->name('maintenance.message');
    Route::get('casted_votes/{transaction_number}', [CastedVoteController::class, 'show'])->name('casted_votes.show');
    Route::post('/candidates/bulk-delete', [CandidateController::class, 'bulkDelete'])->name('candidates.bulk-delete');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
