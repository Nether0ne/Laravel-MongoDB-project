<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/games/', [GameController::class, 'all']);
Route::get('/game/{_id}/', [GameController::class, 'get']);
Route::post('/game/{_id}/buy', [GameController::class, 'buy'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'all']);
Route::get('/category/{_id}', [CategoryController::class, 'get']);

Route::get('/users/', [UserController::class, 'all']);
Route::get('/user/{id}/', [UserController::class, 'get']);
Route::get('/user/{id}/friends', [UserController::class, 'friends']);
Route::get('/library', [UserController::class, 'library'])->middleware('auth')->name('library');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
