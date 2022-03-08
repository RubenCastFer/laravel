<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionAviso;
use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionPeticion;

class PeliculasController extends Controller
{
    public $peli;
    public function __construct(Peliculas $peli)
    {
        $this->peli = $peli;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelis = $this->peli->obtenerPeliculas();
        return view('pelis.Listar', ['pelis' => $pelis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelis.PeliForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peli = new Peliculas($request->all());
        if (empty($peli->titulo)) {
            return redirect()->action([PeliculasController::class, 'create']);
        }
        if ($peli->duracion<=0) {
            return redirect()->action([PeliculasController::class, 'create']);
        }
        $peli->save();
        return redirect()->action([PeliculasController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peli = $this->peli->obtenerPelicula($id);
        return view('pelis.Listar', ['peli' => $peli]);
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

    public function aviso($id){
        $aviso = $this->peli->obtenerPelicula($id);
        Mail::to($aviso->email)->send(new NotificacionAviso($aviso));
 
        return redirect()->action([PeliculasController::class, 'index']);
    }
}
