<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialController;
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

Route::get('/libros/CrearLibro', [LibroController::class, 'create']);

Route::post('/libros/CrearLibro',  [LibroController::class, 'store']);

Route::get('/libros/Detalles/{isbn}', [LibroController::class, 'show']);

Route::get('/libros/Editar/{isbn}', [LibroController::class, 'edit']);

Route::put('/libros/Editar/{isbn}',  [LibroController::class, 'update']);

Route::get('/editoriales/CrearEditorial', [EditorialController::class, 'create']);

Route::post('/editoriales/CrearEditorial',  [EditorialController::class, 'store']);

Route::get('/libros/Eliminar/{isbn}', [LibroController::class, 'destroy']);

Route::get('/home', function(){
    return view('index');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

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
