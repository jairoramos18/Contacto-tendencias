<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Ruta principal que devuelve la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes(); // Esto debería registrar todas las rutas necesarias para la autenticación

// Ruta de home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para enviar correos
Route::get('/send-email', [EmailController::class, 'sendWelcomeEmail']);

// Ruta para enviar mensajes de contacto
Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensaje'])->name('contacto.enviar');

// Ruta para el dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas para el restablecimiento de contraseña
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
