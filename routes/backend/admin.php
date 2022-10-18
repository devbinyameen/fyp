<?php

use App\Domains\Auth\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\ServiceController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.

Route::get('dashboard',[ DashboardController::class, 'index' ])->name('dashboard');

Route::resource('users', UserController::class );
Route::resource('services', ServiceController::class );
Route::resource('categories', CategoryController::class );
Route::resource('appointments', AppointmentController::class);

Route::get('pending_appointments', [AppointmentController::class, 'pending'])->name('appointments.pending');
Route::get('booked_appointments', [AppointmentController::class, 'requested'])->name('appointments.requested');

Route::get('pending_users', [ UserController::class, 'pendingUsers' ])->name('users.pending');
Route::get('accept_user_request/{user}', [ UserController::class, 'acceptRequest' ])->name('users.acceptRequest');