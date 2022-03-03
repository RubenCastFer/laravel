<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peticion;
use Illuminate\Support\Facades\Mail;
 
use App\Mail\NotificacionPeticion;

class PeticionesController extends Controller
{

    protected $peticiones;
    public function __construct(Peticion $peticiones)
    {
        $this->$peticiones = $peticiones;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $peticiones = $this->peticiones->obtenerPeticiones();
        $peticiones = Peticion::all();

        return view('libros.Peticiones', ['peticiones' => $peticiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.Peticion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peticion = new Peticion($request->all());
        $peticion->save();
        Mail::to($request->input('mail'))->send(new NotificacionPeticion($peticion));
 
        return redirect()->action([LibroController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
