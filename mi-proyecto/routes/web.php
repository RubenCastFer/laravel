<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PeliculasController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/libros', [LibroController::class, 'index']);

Route::get('/libros/CrearLibro', [LibroController::class, 'create'])->middleware(['auth']);

Route::post('/libros/CrearLibro',  [LibroController::class, 'store'])->middleware(['auth']);

Route::get('/libros/Detalles/{isbn}', [LibroController::class, 'show']);

Route::get('/libros/Editar/{isbn}', [LibroController::class, 'edit'])->middleware(['auth']);

Route::put('/libros/Editar/{isbn}',  [LibroController::class, 'update'])->middleware(['auth']);

Route::get('/editoriales/CrearEditorial', [EditorialController::class, 'create'])->middleware(['auth']);

Route::post('/editoriales/CrearEditorial',  [EditorialController::class, 'store'])->middleware(['auth']);

Route::get('/libros/Eliminar/{isbn}', [LibroController::class, 'destroy'])->middleware(['auth']);

Route::get('/libros/Peticiones', [PeticionesController::class, 'index'])->middleware(['auth']);

Route::get('/libros/Peticion', [PeticionesController::class, 'create']);

Route::post('/libros/Peticion',  [PeticionesController::class, 'store']);

Route::get('/libros/PDF', [LibroController::class, 'guardarListado']);

Route::get('/libros/DetallePDF/{isbn}', [LibroController::class, 'guardarDetalle']);

Route::get('/pelis/PeliForm', [PeliculasController::class, 'create'])->middleware(['auth']);

Route::post('/pelis/PeliForm',  [PeliculasController::class, 'store'])->middleware(['auth']);

Route::get('/pelis/Listar', [PeliculasController::class, 'index']);

Route::get('/pelis/Detalles/{id}', [PeliculasController::class, 'show']);

Route::get('/pelis/Aviso/{id}', [PeliculasController::class, 'aviso']);


// Route::get('/home', function(){
//     return view('index');
// });

// Route::get('/about', function(){
//     return view('about');
// });

// Route::get('/contact', function(){
//     return view('contact');
// });

// Route::get('/CrearEditorial', function(){
//     return view('CrearEditorial');
// });

// Route::get('/CrearEditorial', function(){
//     return view('CrearEditorial');
// });

// Route::get('/CrearLibro', function(){
//     return view('CrearEditorial');
// });

// Route::get('/CrearEditorial', function(){
//     return view('CrearEditorial');
// });

require __DIR__.'/auth.php';
