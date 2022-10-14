<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\QuoteSimpleController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth;


Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard',[DashboardController::class, 'index']);

Route::resource('/expense_quotes', QuotesController::class);

Route::get('/expense_quotes/{id}/confirmDelete', [QuotesController::class, 'confirmDelete']);

Route::get('/expense_quotes/{expense_quotes}/expenses/create', [QuoteSimpleController::class, 'create']);

Route::post('/expense_quotes/{expense_quotes}/expenses', [QuoteSimpleController::class, 'store']);

Route::get('/expense_quotes/{id}/confirmSendMail', [QuotesController::class, 'confirmSendMail']);

Route::post('/expense_quotes/{id}/sendMail', [QuotesController::class, 'sendMail']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
