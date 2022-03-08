<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;
class LibroController extends Controller
{

    protected $libros;
    public function __construct(Libros $libros)
    {
        $this->libros = $libros;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = $this->libros->obtenerLibros();
        return view('libros.Listar', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.CrearLibro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = new Libros($request->all());
        $libro->save();
        return redirect()->action([LibroController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        $libro = $this->libros->obtenerLibro($isbn);
        // $libro=Libros::find($isbn);
        return view('libros.Detalles', ['libro' => $libro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $libro = $this->libros->obtenerLibro($isbn);;
        return view('libros.Editar', ['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {
        $libro = Libros::find($isbn);
        $libro->fill($request->all());
        $libro->save();
        return redirect()->action([LibroController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $libro = Libros::find($isbn);
        $libro->delete();
        return redirect()->action([LibroController::class, 'index']);
    }

    public function guardarListado(){
        $datos =[
            "libros"=>Libros::all()
        ];
        $pdf = PDF::loadView('libros.ListaPDF', $datos);
     
        return $pdf->download('libros.pdf');
    }

    public function guardarDetalle($isbn){
        $libro =[
            "libro"=>Libros::find($isbn)
        ];
        $pdf = PDF::loadView('libros.DetallePDF', $libro);
      
        return $pdf->download('libro.pdf');
    }
}
