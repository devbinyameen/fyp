<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\HomeController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['']], function () {
    includeRouteFiles(__DIR__.'/backend/');
});


Route::group(['prefix' => 'client', 'as' => 'client.', 'middleware' => ['auth','has_role:Client']], function () {
    includeRouteFiles(__DIR__.'/client/');
});

Route::view('about_us','frontend.pages.about_us');
Route::view('contact_us','frontend.pages.contact_us');
Route::view('faqs','frontend.pages.faqs');
Route::view('blog_I','frontend.pages.blog_I');
Route::view('blog_II','frontend.pages.blog_II');


Auth::routes();

Route::get('/home', [ HomeController::class, 'index' ])->name('home');
Route::get('/booking',[ HomeController::class, 'booking' ]);
Route::get('/calendar/{company_id}',[ HomeController::class, 'calendar' ])->middleware('auth');
Route::post('/calendar',[ HomeController::class, 'postCalendar' ])->name('calendar.post')->middleware('auth');