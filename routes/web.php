<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VouchersController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/contact', [ContactController::class, 'create'])->name('public.contact.create');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:10,2')->name('public.contact.store');
Route::get('/redeem', [RedeemController::class, 'create']);
Route::post('/redeem', [RedeemController::class, 'store'])
    ->middleware('throttle:10,2')->name('redeem.store');

// admin dashboard route
Route::middleware(['auth', IsAdmin::class])->prefix('dashboard')->group(function () {
    Route::delete('/contacts', [ContactController::class, 'destory'])->name('contacts.destroy');
    Route::resource('/settings', SettingsController::class);
    Route::resource('/vouchers', VouchersController::class);
    Route::resource('/rewards', RewardsController::class);
    Route::resource('/logs', LogsController::class);
});
// admin & user route
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('/contacts', ContactController::class);
    Route::resource('/redeems', RedeemController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
