<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TwoFactorAuthController;



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


// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});


// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rutas de 2FA
Route::get('/2fa', [TwoFactorAuthController::class, 'show2faForm'])->name('2fa');
Route::post('/2fa/verify', [TwoFactorAuthController::class, 'verify2fa'])->name('2fa.verify');
Route::post('/2fa/send', [TwoFactorAuthController::class, 'send2faCode'])->name('2fa.send');

// Ruta protegida (solo para usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');







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