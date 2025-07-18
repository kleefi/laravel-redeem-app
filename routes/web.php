<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RedeemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/contact', [ContactController::class, 'create'])->name('public.contact.create');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:10,2')->name('public.contact.store');
Route::get('/redeem', [RedeemController::class, 'index']);
Route::post('/redeem', [RedeemController::class, 'store'])
    ->middleware('throttle:10,2')->name('redeem.store');

// admin dashboard route
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('/contacts', ContactController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
