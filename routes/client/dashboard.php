<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\BranchController;
use App\Http\Controllers\Client\DeliveryController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.

Route::get('dashboard',[ DashboardController::class, 'index' ])->name('dashboard');

Route::resource('branches', BranchController::class);

Route::resource('deliveries', DeliveryController::class);
Route::get('pending_deliveries', [DeliveryController::class, 'pending'])->name('deliveries.pending');
Route::get('delivered_deliveries', [DeliveryController::class, 'delivered'])->name('deliveries.delivered');