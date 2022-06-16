<?php

use App\Http\Controllers\Auth\ClienteAuthController;
use App\Http\Controllers\Auth\EmpleadoAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/cliente/login', [ClienteAuthController::class, 'showLoginForm'])->name('cliente.login');

Route::post('/cliente/login', [ClienteAuthController::class, 'login']);

Route::get('/cliente/register', [ClienteAuthController::class, 'showRegisterForm'])->name('cliente.register');

Route::put('/cliente/register', [ClienteAuthController::class, 'register']);

Route::put('/cliente/cambiopassword',  [ClienteAuthController::class, 'cambiarContrasenya'])->middleware(['cliente']);

Route::put('/cliente/cambio',  [ClienteAuthController::class, 'cambioUsuario'])->middleware(['cliente']);



Route::get('/empleado/login', [EmpleadoAuthController::class, 'showLoginForm'])->name('empleado.login');

Route::post('/empleado/login', [EmpleadoAuthController::class, 'login']);

Route::put('/empleado/modificarempleado',  [EmpleadoAuthController::class, 'updateEmpleado'])->middleware(['empleado']);

Route::get('/empleado/cambiopassword', [EmpleadoAuthController::class, 'showcambiarContrasenya'])->middleware(['empleado']);

Route::put('/empleado/cambiopassword',  [EmpleadoAuthController::class, 'cambiarContrasenya'])->middleware(['empleado']);

Route::put('/empleado/cambio',  [EmpleadoAuthController::class, 'cambioUsuario'])->middleware(['empleado']);



Route::get('/cliente/logout', [ClienteAuthController::class, 'logout'])->name('cliente.logout')->middleware(['cliente']);

Route::get('/empleado/logout', [EmpleadoAuthController::class, 'logout'])->name('empleado.logout')->middleware(['empleado']);
