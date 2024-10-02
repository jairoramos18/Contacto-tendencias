<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;

// Ruta principal que devuelve la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Ruta de home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para enviar correos
Route::get('/send-email', [EmailController::class, 'sendWelcomeEmail']);

// Ruta para enviar mensajes de contacto
Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensaje'])->name('contacto.enviar');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
