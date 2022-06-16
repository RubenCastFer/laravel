<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\ClienteAuthController;
// use App\Http\Controllers\Auth\EmpleadoAuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;


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

Route::get('/', [ClienteController::class, 'portada']);

Route::get('/cliente/dashboard', [ClienteController::class, 'dashboard'])->name('cliente.dashboard')->middleware(['cliente']);

Route::post('/cliente/coche', [ClienteController::class, 'elegirCoche']);

Route::get('/cliente/presupuesto', [ClienteController::class, 'presupuesto']);

Route::post('/cliente/presupuesto', [ClienteController::class, 'presupuesto']);

Route::post('/cliente/pago', [ClienteController::class, 'guardarAlquiler'])->middleware(['cliente']);

Route::get('/cliente/eliminaralquiler/{idAlquiler}', [ClienteController::class, 'destroyAlquiler'])->middleware(['cliente']);

Route::get('/cliente/perfil', [ClienteController::class, 'vistaPerfil'])->middleware(['cliente']);



Route::get('/empleado/dashboard', [EmpleadoController::class, 'dashboard'])->name('empleado.dashboard')->middleware(['empleado']);

Route::get('/empleado/tablaempleado', [EmpleadoController::class, 'tablaEmpleados'])->name('empleado.empleados')->middleware(['empleado']);

Route::get('/empleado/modificarempleado/{idEmpleado}', [EmpleadoController::class, 'editEmpleado'])->middleware(['empleado']);

Route::get('/empleado/eliminarempleado/{idEmpleado}', [EmpleadoController::class, 'destroyEmpleado'])->middleware(['empleado']);



Route::get('/empleado/tablacoche', [EmpleadoController::class, 'tablaCoches'])->name('empleado.coches')->middleware(['empleado']);

Route::get('/empleado/modificarcoche/{id}', [EmpleadoController::class, 'editCoche'])->middleware(['empleado']);

Route::put('/empleado/modificarcoche',  [EmpleadoController::class, 'updateCoche'])->middleware(['empleado']);

Route::get('/empleado/eliminarcoche/{id}', [EmpleadoController::class, 'destroyCoche'])->middleware(['empleado']);



Route::get('/empleado/tablaalquiler', [EmpleadoController::class, 'tablaAlquileres'])->name('empleado.alquileres')->middleware(['empleado']);

Route::get('/empleado/modificaralquiler/{id}', [EmpleadoController::class, 'editAlquiler'])->middleware(['empleado']);

Route::put('/empleado/modificaralquiler/{id}',  [EmpleadoController::class, 'updateAlquiler'])->middleware(['empleado']);

Route::get('/empleado/eliminaralquiler/{idAlquiler}', [EmpleadoController::class, 'destroyAlquiler'])->middleware(['empleado']);

Route::get('/empleado/perfil', [EmpleadoController::class, 'vistaPerfil'])->middleware(['empleado']);

require __DIR__.'/auth.php';