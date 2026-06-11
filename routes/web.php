<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/developer-workspace', function () {
        return view('developer-workspace');
    })->name('developer.workspace');

    Route::get('/ticket/create', [TicketController::class, 'create'])->name('tickets.create');

    Route::post('/ticket', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/ticketlist', [TicketController::class, 'index'])->name('ticketlist.index');
    Route::put('/ticket/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});