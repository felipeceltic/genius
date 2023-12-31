<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SacadoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sacado/criar')->name('sacado.create')->uses([App\Http\Controllers\SacadoController::class, 'create'])->middleware('auth');
Route::post('/sacado/salvar')->name('sacado.store')->uses([App\Http\Controllers\SacadoController::class, 'store'])->middleware('auth');
Route::post('/sacado/atualizar')->name('sacado.update')->uses([App\Http\Controllers\SacadoController::class, 'update'])->middleware('auth');
Route::get('/sacado/listar')->name('sacado.list')->uses([App\Http\Controllers\SacadoController::class, 'list'])->middleware('auth');
Route::get('/sacado/buscar')->name('sacado.search')->uses([App\Http\Controllers\SacadoController::class, 'search'])->middleware('auth');
Route::get('/sacado/detalhes/{sacado}')->name('sacado.details')->uses([App\Http\Controllers\SacadoController::class, 'details'])->middleware('auth');

Route::get('/usuario')->name('user.create')->uses([App\Http\Controllers\UserController::class, 'create'])->middleware('auth');
Route::post('/usuario/salvar')->name('user.store')->uses([App\Http\Controllers\UserController::class, 'store'])->middleware('auth');

Route::get('/suporte')->name('support.create')->uses([App\Http\Controllers\SupportController::class, 'create'])->middleware('auth');
Route::post('/suporte/enviar')->name('support.send')->uses([App\Http\Controllers\SupportController::class, 'sendEmail'])->middleware('auth');