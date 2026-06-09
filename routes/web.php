<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;

// ── Páginas públicas ───────────────────────────────────────────────────────────
Route::get('/',         [HomeController::class, 'index'])->name('home');
Route::get('/buscar',   [HomeController::class, 'buscar'])->name('buscar');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('/contacto',[HomeController::class, 'contactoEnviar'])->name('contacto.enviar');
Route::get('/buzon',    [HomeController::class, 'buzon'])->name('buzon');
Route::get('/ayuda',    [HomeController::class, 'ayuda'])->name('ayuda');
Route::get('/mapa-sitio', [HomeController::class, 'mapaSitio'])->name('mapa-sitio');

// ── Autenticación ──────────────────────────────────────────────────────────────
Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

// ── Recuperación de contraseña ─────────────────────────────────────────────────
Route::get('/forgot-password',   [PasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password',  [PasswordResetController::class, 'sendCode'])->name('password.email');
Route::get('/verify-code',       [PasswordResetController::class, 'showVerify'])->name('password.verify');
Route::post('/verify-code',      [PasswordResetController::class, 'verifyCode'])->name('password.verify.check');
Route::get('/reset-password',    [PasswordResetController::class, 'showReset'])->name('password.reset');
Route::post('/reset-password',   [PasswordResetController::class, 'reset'])->name('password.update');
