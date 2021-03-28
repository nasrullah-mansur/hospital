<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
Route::get('/', function() {
    return redirect()->route('dashboard');
});

// DASHBOARD;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// PROFILE;
Route::get('/user/{id}/{slug}/add-personal-info', [ProfileController::class, 'add'])->name('profile.add');
Route::get('/user/{id}/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/user/{id}/{slug}/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/user/{id}/{slug}/full-update', [ProfileController::class, 'full_update'])->name('profile.full.update');


// TICKET;
Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');

// Answer;
Route::post('/ticket/answer', [AnswerController::class, 'store'])->name('ticket.answer');

// ADMIN;
Route::get('/admin/{id}/{slug}', [AdminController::class, 'dashboard'])->name('admin.dashboard');


// USER;
Route::get('/user/{id}/{slug}', [UserController::class, 'dashboard'])->name('user.dashboard');






