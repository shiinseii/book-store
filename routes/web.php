<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/author', [AuthorController::class, 'index'])->name('author');

Route::get('/rate', [RatingController::class, 'create'])->name('rating.create');

Route::post('/rate', [RatingController::class, 'store'])->name('rating.store');
