<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionAlquiler;
use App\Mail\NotificacionAlquilerAnulacion;
use App\Models\Coches;
use App\Models\Alquiler;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * ClienteController
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class ClienteController extends Controller
{
    
    /**
     * Muestra la portada
     *
     * @return void
     */
    public function portada(){
        $coches=Coches::all();
        return view('cliente.principal',['coches'=>$coches]);
    }
    
    /**
     * Muestra los alquileres así como un formulario para realizar otra operación
     *
     * @return void
     */
    public function dashboard()
    {
        $alquileres= Alquiler::alquileres(session('usuario')[0]->id_Cliente);
        return view('cliente.dashboard',['alquileres'=>$alquileres]);
    }

    /**
     * Mostrara los coches disponibles para la fecha indicada por el cliente
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
    
    /**
     * Presupuesto
     * Los datos se guardaran en una sesion en caso de que el 
     * usuario no este registrado o iniciado sesion, al hacerlo 
     * se recupera y continua el proceso con los datos de la sesion.
     * 
     * @param  mixed $request
     * @return void
     */
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
    
    /**
     * Se guardara el alquiler con todos los datos en la base de datos
     *
     * @param  mixed $request
     * @return void
     */
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
        $alquiler=Alquiler::alquileresFind($alquiler->id_Alquiler);
        Mail::to($alquiler[0]->email)->send(new NotificacionAlquiler($alquiler[0]));
        session()->forget('datosPresupuesto');
        return redirect()->action([ClienteController::class, 'dashboard']);
    }

    
    /**
     * Elimina el alquiler según el id en la base de datos
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyAlquiler($id)
    {
        $alquiler = Alquiler::find($id);
        $datos=Alquiler::alquileresFind($id);
        Mail::to($datos[0]->email)->send(new NotificacionAlquilerAnulacion($datos[0]));
        $alquiler->delete();
        return redirect()->action([ClienteController::class, 'dashboard']);
    }

    
    /**
     * Muestra el perfil
     *
     * @return void
     */
    public function vistaPerfil(){
        return view('cliente.perfil');
    }
}
