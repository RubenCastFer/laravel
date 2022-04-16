<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{



    public function dashboard()
    {
        return view('cliente.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function elegirCoche(Request $request)
    {
        $reserva = $request->all();
        $recogida = str_replace('T', ' ', $reserva['recogida']);
        $devolucion = str_replace('T', ' ', $reserva['devolucion']);

        session(['recogida' => $recogida]);
        session(['devolucion' => $devolucion]);
        session(['sucursal' => $reserva['sucursal']]);
        $cochesLibres = Coches::cochesLibres($recogida, $devolucion);
        return view('cliente.coche', ['cochesLibres' => $cochesLibres]);
    }

    public function presupuesto(Request $request)
    {
        if (!empty(session('datosPresupuesto'))) {
            $datos = session('datosPresupuesto');
        } else {
            $cocheElegido = Coches::cocheEspecifico($request->input('id_Coche'));
            $recogida = session('recogida');
            $devolucion = session('devolucion');
            $feche1 = new DateTime($recogida);
            $feche2 = new DateTime($devolucion);
            $diff = $feche1->diff($feche2);
            $minutos = (($diff->days * 24) * 60) + ($diff->h * 60) + ($diff->i);
            $dias = ceil(($minutos / 60) / 24);
            $precioTotal = $dias * $cocheElegido[0]->precio;
            $datos = ['precioTotal' => $precioTotal, 'dias' => $dias, 'recogida' => $recogida, 'devolucion' => $devolucion, 'sucursal' => session('sucursal'), 'coche' => $cocheElegido];
        }

        session(['datosPresupuesto' => $datos]);
        return view('cliente.presupuesto', ['datos' => $datos]);
    }
}
