<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use App\Models\Alquiler;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{



    public function dashboard()
    {
        $alquileres= Alquiler::alquileres(session('usuario')[0]->id_Cliente);
        return view('cliente.dashboard',['alquileres'=>$alquileres]);
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

        session(['datosPresupuesto' => NULL]);
        session(['recogida' => $recogida]);
        session(['devolucion' => $devolucion]);
        session(['sucursal' => $reserva['sucursal']]);
        $cochesLibres = Coches::cochesLibres($recogida, $devolucion);
        return view('cliente.coche', ['cochesLibres' => $cochesLibres]);
    }

    public function presupuesto(Request $request)
    {
        /**
         * 
         * Los datos se guardaran en una sesion en caso de que el usuario no este registrado
         * o iniciado sesion, al hacerlo se recupera y continua el proceso con los datos de la sesion.
         * 
         */
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
            $fechaContrato= date('Y-m-d H:i');
            $precioTotal = $dias * $cocheElegido[0]->precio;
            $datos = ['precioTotal' => $precioTotal,
                    'dias' => $dias,
                    'recogida' => $recogida, 
                    'devolucion' => $devolucion,
                    'contrato'=>$fechaContrato, 
                    'sucursal' => session('sucursal'), 
                    'coche' => $cocheElegido];
        }

        session(['datosPresupuesto' => $datos]);
        return view('cliente.presupuesto', ['datos' => $datos]);
    }

    public function guardarAlquiler(Request $request){
        $alquiler=new Alquiler(['id_Cliente'=>session('usuario')[0]->id_Cliente,
                    'id_Coche'=>session('datosPresupuesto')['coche'][0]->id_Coche,
                    'precio_total'=>session('datosPresupuesto')['precioTotal'],
                    'fecha_contrato'=>session('datosPresupuesto')['contrato'],
                    'fecha_inicio'=>session('datosPresupuesto')['recogida'],
                    'fecha_fin'=>session('datosPresupuesto')['devolucion'],
                    'observacion'=>'',
                    'estado'=>'Preparación']);
        $alquiler->save();
        return redirect()->action([ClienteController::class, 'dashboard']);
    }
}
