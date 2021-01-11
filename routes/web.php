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
use App\Http\Controllers\HomeController;

Route::get('/', [PagesController::class, 'login']);
Route::get('/register', [PagesController::class, 'register']);
Route::get('/users', [PagesController::class, 'user']);
Route::get('/projects', [PagesController::class, 'project']);
Route::get('/tickets', [PagesController::class, 'ticket']);
Route::get('/profile', [PagesController::class, 'profile']);
Route::resource('dashboard', 'App\Http\Controllers\DashboardController');
Route::resource('users', 'App\Http\Controllers\UsersController');
Route::resource('projects', 'App\Http\Controllers\ProjectsController');
Route::resource('tickets', 'App\Http\Controllers\TicketsController');

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');

Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword')->name('password.reset');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');