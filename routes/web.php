<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TipodocumentoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CiudadController;

// Ruta principal que devuelve la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes(); // Esto debería registrar todas las rutas necesarias para la autenticación

// Ruta de home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas que requieren autenticación
Route::group(['middleware' => ['auth']], function () {
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

    // Rutas para contactos
    Route::resource('contactos', ContactoController::class); // Esto crea las rutas index, create, store, show, edit, update, destroy
    Route::post('/cambioestadocontacto', [ContactoController::class, 'cambioestadoContacto']);


    // Rutas para empresas
    Route::resource('empresas', EmpresaController::class); // Esto crea las rutas index, create, store, show, edit, update, destroy
    Route::post('cambioestadoempresa', [EmpresaController::class, 'cambioestadoEmpresa'])->name('empresa.cambioestado');

    // Rutas para países
    Route::resource('paises', PaisController::class);
    Route::get('cambioestadopais', [PaisController::class, 'cambioestadopais'])->name('cambioestadopais');

    // Rutas para departamentos
    Route::resource('departamentos', DepartamentoController::class);
    Route::get('cambioestadodepartamento', [DepartamentoController::class, 'cambioestadodepartamento'])->name('cambioestadodepartamento');

    // Rutas para ciudades
    Route::resource('ciudads', CiudadController::class);
    Route::get('cambioestadociudad', [CiudadController::class, 'cambioestadociudad'])->name('cambioestadociudad');
    Route::get('getDepartamentos', [CiudadController::class, 'getDepartamentos'])->name('getDepartamentos');
    Route::get('getDepartamentosEdit', [CiudadController::class, 'getDepartamentosEdit'])->name('getDepartamentosEdit');

    // Rutas para tipos de documentos
    Route::resource('tipodocumentos', TipodocumentoController::class);
    Route::get('cambioestadotipodocumento', [TipodocumentoController::class, 'cambioestadotipodocumento'])->name('cambioestadotipodocumento');
});
