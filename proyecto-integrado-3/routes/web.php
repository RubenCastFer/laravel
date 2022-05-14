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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('cliente.principal');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::get('/cliente/login', [ClienteAuthController::class, 'showLoginForm'])->name('cliente.login');
// Route::post('/cliente/login', [ClienteAuthController::class, 'login'])->name('cliente.login');
// Route::get('/cliente/logout', [ClienteAuthController::class, 'logout'])->name('cliente.logout');
Route::get('/cliente/dashboard', [ClienteController::class, 'dashboard'])->name('cliente.dashboard')->middleware(['cliente']);

Route::post('/cliente/coche', [ClienteController::class, 'elegirCoche']);

Route::get('/cliente/presupuesto', [ClienteController::class, 'presupuesto']);

Route::post('/cliente/presupuesto', [ClienteController::class, 'presupuesto']);

Route::post('/cliente/pago', [ClienteController::class, 'guardarAlquiler']);


// Route::get('/empleado/login', [EmpleadoAuthController::class, 'showLoginForm'])->name('empleado.login');
// Route::post('/empleado/login', [EmpleadoAuthController::class, 'login'])->name('empleado.login');
// Route::get('/empleado/logout', [EmpleadoAuthController::class, 'logout'])->name('empleado.logout');


Route::get('/empleado/dashboard', [EmpleadoController::class, 'dashboard'])->name('empleado.dashboard')->middleware(['empleado']);

Route::get('/empleado/tablaempleado', [EmpleadoController::class, 'tablaEmpleados'])->name('empleado.empleados')->middleware(['empleado']);

Route::get('/empleado/tablacoche', [EmpleadoController::class, 'tablaCoches'])->name('empleado.coches')->middleware(['empleado']);

Route::get('/empleado/modificarcoche/{id}', [EmpleadoController::class, 'editCoche'])->middleware(['empleado']);

Route::put('/empleado/modificarcoche',  [EmpleadoController::class, 'updateCoche'])->middleware(['empleado']);

Route::get('/empleado/eliminarcoche/{id}', [EmpleadoController::class, 'destroyCoche'])->middleware(['empleado']);



Route::get('/empleado/tablaalquiler', [EmpleadoController::class, 'tablaAlquileres'])->name('empleado.alquileres')->middleware(['empleado']);

Route::get('/empleado/modificaralquiler/{id}', [EmpleadoController::class, 'editAlquiler'])->middleware(['empleado']);

Route::put('/empleado/modificaralquiler/{id}',  [EmpleadoController::class, 'updateAlquiler'])->middleware(['empleado']);

require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
