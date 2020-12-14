<?php

// use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/users', [PagesController::class, 'user']);
Route::get('/projects', [PagesController::class, 'project']);
Route::get('/tickets', [PagesController::class, 'ticket']);
Route::get('/profile', [PagesController::class, 'profile']);


