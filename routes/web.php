<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\StatusController;
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
Route::get('/patient/{id}/{slug}/add-personal-info', [ProfileController::class, 'add'])->name('profile.add');
Route::get('/patient/{id}/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/patient/{id}/{slug}/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/patient/{id}/{slug}/full-update', [ProfileController::class, 'full_update'])->name('profile.full.update');
// Just for admin;
Route::get('/patient/{id}/{slug}/profile', [ProfileController::class, 'show'])->name('profile.show');


// TICKET;
Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/tickets/all-tickets', [TicketController::class, 'all_tickets'])->name('all.tickets');
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/ticket/patient/{id}/{slug}', [TicketController::class, 'p_tickets'])->name('p.tickets');
Route::get('/ticket/p-patient/{id}/get', [TicketController::class, 'p_tickets_get'])->name('p.tickets.get');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::get('/ticket/{id}/destroy', [TicketController::class, 'destroy'])->name('ticket.destroy');

// Answer;
Route::post('/ticket/answer', [AnswerController::class, 'store'])->name('ticket.answer');

// ADMIN;
Route::get('/admin/{id}/{slug}', [AdminController::class, 'dashboard'])->name('admin.dashboard');


// USER;
Route::get('/patients', [UserController::class, 'index'])->name('patients.all');
Route::get('/patient/{id}/{slug}', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/patients/all', [UserController::class, 'all_patients'])->name('patients.all.get');

// just for admin;
Route::get('/user/destroy/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/block/{id}',[UserController::class, 'block'])->name('user.block');
Route::get('/user/active/{id}',[UserController::class, 'active'])->name('user.active');


// TICKET STATUS;
Route::get('/ticket/status/{id}/new', [StatusController::class, 'new'])->name('status.new');
Route::get('/ticket/status/{id}/waiting', [StatusController::class, 'waiting'])->name('status.waiting');
Route::get('/ticket/status/{id}/opened', [StatusController::class, 'opened'])->name('status.opened');
Route::get('/ticket/status/{id}/responded', [StatusController::class, 'responded'])->name('status.responded');
Route::get('/ticket/status/{id}/closed', [StatusController::class, 'closed'])->name('status.closed');



// PHOTOS;
Route::get('/wound-photo/create', [PhotoController::class, 'create'])->name('photo.create');
Route::get('/wound-photo/{id}/show', [PhotoController::class, 'show'])->name('photo.show');
Route::post('/wound-photo/store', [PhotoController::class, 'store'])->name('photo.store');
Route::get('/wound-photo/{id}/destroy', [PhotoController::class, 'destroy'])->name('photo.destroy');
Route::get('/wound-photo/all-user', [PhotoController::class, 'user_has_wound_view'])->name('user.wound.photo');
Route::get('/wound-photo/all-user/get', [PhotoController::class, 'user_has_wound_get'])->name('user.wound.photo.get');




