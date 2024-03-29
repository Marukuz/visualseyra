<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ImagesController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
Route::resource('posts', AdminPostController::class);
Route::resource('servicio', ServicioController::class); 
Route::resource('agenda', EventController::class); 
Route::resource('pack', PackController::class); 
Route::resource('galeria', GaleriaController::class); 
Route::resource('images', ImagesController::class); 


// Agenda routes

Route::post('/agenda/editar/{id}', [EventController::class,'edit']);
Route::post('/cita/create/{id}', [EventController::class,'citaUsuario'])->name('cita.create');

// Posts routes
Route::get('/post', [PostController::class, 'home'])->name('posts.home');
Route::get('/post/{slug}', [PostController::class, 'detail'])->name('posts.detail');

// Comments routes
Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comment/delete/{id}', [CommentController::class, 'eliminarComentario'])->name('comments.delete');
// Servicios routes
Route::get('/servicios',[ServicioController::class, 'indexAdmin'])->name('servicio.listar');
Route::get('/servicios/{id}/packs',[ServicioController::class, 'showPacks'])->name('servicio.packs');

// User Routes
Route::put('/perfil/password/{id}', [UserController::class, 'updatePass'])->name('updatePassword');
Route::post('/usuario/crear', [UserController::class, 'storeUser'])->name('usuario.store');

// Cita Routes
Route::get('/citas/{id}', [EventController::class,'showCitaUsuario'])->name('cita.show');
Route::delete('/citas/cancelar/{id}',[EventController::class,'cancelarCita'])->name('cita.cancel');

// Galeria Routes
Route::get('galeria/addfoto/{id}',[GaleriaController::class,'addFoto'])->name('galeria.addfoto');
Route::post('uploadfoto/{id}',[GaleriaController::class,'storeFoto'])->name('galeria.storefoto');
Route::get('galeria/{id}/images',[GaleriaController::class,'showFotos'])->name('galeria.showimages');
// Google Routes
 
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('google');
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    
    $userExists = User::where('google_id',$user->id)->where('external_auth','google')->exists();
    
    $userRegistred = User::where('email',$user->email)->exists();

    if($userExists){
        $user = User::where('google_id', $user->id)->where('external_auth', 'google')->first();
        Auth::login($user);
    }else if ($userRegistred) {
        $user = User::where('email',$user->email)->first();
        Auth::login($user);
    }else{
        $userNew = User::create([
           'name' => $user->name,
           'email' => $user->email,
           'avatar' => $user->avatar,
           'google_id' => $user->id,
           'external_auth' => 'google',
           'tipo' => 'Usuario'
        ]);
        Auth::login($userNew);
    }
    return redirect('/');
});

require __DIR__.'/auth.php';