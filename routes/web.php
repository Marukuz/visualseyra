<?php

use App\Http\Controllers\UserController;
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

Route::get('/perfil',[UserController::class, 'index'])->name('perfil');

Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);


require __DIR__.'/auth.php';