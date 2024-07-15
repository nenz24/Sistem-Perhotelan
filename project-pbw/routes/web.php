<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ReportController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\MinPresenceController;

Route::get('/reports', [ReportController::class, 'showGenerateReportsForm'])->name('generateReports.form');
Route::get('/generate-report', [ReportController::class, 'generateReport'])->name('generateReports.generate');
Route::get('/presence', [PresenceController::class, 'showPresenceForm'])->name('presence.form');
Route::post('/presence', [PresenceController::class, 'recordPresence'])->name('presence.record');
Route::get('/min-presence', [MinPresenceController::class, 'showMinPresenceForm'])->name('minPresence.form');
Route::post('/min-presence', [MinPresenceController::class, 'recordMinPresence'])->name('minPresence.record');
