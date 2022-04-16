<?php

use App\Http\Controllers\EmpleadoLoginController;
use App\Http\Controllers\ClienteLoginController;
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

Route::get('/cliente/login', [ClienteLoginController::class, 'showLoginForm']);
Route::post('/cliente/login', [ClienteLoginController::class, '@login'])->name('cliente.login.post');
Route::post('/cliente/logout', [ClienteLoginController::class, 'logout'])->name('cliente.logout');


Route::get('/empleado/login', [EmpleadoLoginController::class, 'showLoginForm'])->name('empleado.login');
Route::post('/empleado/login', [EmpleadoLoginController::class, 'login'])->name('empleado.login.post');
Route::post('/empleado/logout', [EmpleadoLoginController::class, 'logout'])->name('empleado.logout');
