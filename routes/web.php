<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
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

Route::get('/','App\\Http\\Controllers\\InicioController@index')->name('inicio');

// Controller Resources
Route::resource('perfil', PerfilController::class); 
Route::resource('inicio', InicioController::class);
Route::resource('admin', AdminController::class);
Route::resource('user', UserController::class);

// User Routes
Route::put('/perfil/password/{id}', [UserController::class, 'updatePass'])->name('updatePassword');

require __DIR__.'/auth.php';