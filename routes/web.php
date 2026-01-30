<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PhoneCheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/leads', [LeadController::class, 'store'])
    ->name('leads.store')
    ->middleware('throttle:10,1');

Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/requisites', fn () => view('requisites'))->name('requisites');
Route::get('/legal', fn () => view('legal.index'))->name('legal.index');
Route::get('/legal/privacy', fn () => view('legal.privacy'))->name('legal.privacy');
Route::get('/legal/terms', fn () => view('legal.terms'))->name('legal.terms');
Route::get('/legal/personal-data', fn () => view('legal.personal-data'))->name('legal.personal-data');

Route::get('/api/employees', [EmployeeController::class, 'search'])
    ->middleware('throttle:60,1');

Route::get('/api/phones/check', [PhoneCheckController::class, 'check'])
    ->middleware('throttle:60,1');
