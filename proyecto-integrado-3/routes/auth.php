<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ClienteAuthController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmpleadoAuthController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
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


// Route::middleware('guest')->group(function () {
// Route::get('register', [RegisteredUserController::class, 'create'])
//     ->name('register');

// Route::post('register', [RegisteredUserController::class, 'store']);

// Route::get('login', [AuthenticatedSessionController::class, 'create'])
//     ->name('login');

// Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//     ->name('password.request');

// Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//     ->name('password.email');

// Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//     ->name('password.reset');

// Route::post('reset-password', [NewPasswordController::class, 'store'])
//     ->name('password.update');

// });



// Route::middleware('auth')->group(function () {
//     Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
//         ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//         ->middleware('throttle:6,1')
//         ->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//         ->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('logout');
// });

Route::get('/cliente/logout', [ClienteAuthController::class, 'logout'])->name('cliente.logout')->middleware(['cliente']);


Route::get('/empleado/logout', [EmpleadoAuthController::class, 'logout'])->name('empleado.logout')->middleware(['empleado']);
