<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Coches;
use App\Models\EmpleadoAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * EmpleadoController
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 * 
 */
class EmpleadoController extends Controller
{

    
    /**
     * Muestra un menú, con acceso a las tres tablas empleados, alquileres y coches
     * 
     * 
     * @return void
     */
    public function dashboard()
    {
        
        return view('empleado.dashboard');
    }
    
    /**
     * Vista de todos los empleados
     *
     * @return void
     */
    public function tablaEmpleados()
    {
        $empleados = EmpleadoAuth::allEmpleados ();
        return view('empleado.empleados', ['empleados' => $empleados]);
    }

        
    /**
     * Prepara la vista para editar o crear un nuevo empleado
     *
     * @param  mixed $id_Empleado
     * @return void
     */
    public function editEmpleado($id_Empleado)
    {
        $empleado = null;
        if ($id_Empleado != "null") {
            $result = EmpleadoAuth::findEmpleado($id_Empleado);
            $empleado=$result[0];
        }
        return view('empleado.modificarempleado', ['empleado' => $empleado]);
    }
    
    /**
     * Elimina el empleado según el id en la base de datos
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyEmpleado($id)
    {
        $empleado = EmpleadoAuth::find($id);
        $empleado->delete();
        return redirect()->action([EmpleadoController::class, 'tablaEmpleados']);
    }


    
    /**
     * Vista de todos los coches
     *
     * @return void
     */
    public function tablaCoches()
    {
        $coches = Coches::all();
        return view('empleado.coches', ['coches' => $coches]);
    }
    
    /**
     * Prepara la vista para editar o crear un nuevo coche
     *
     * @param  mixed $id_Coche
     * @return void
     */
    public function editCoche($id_Coche)
    {
        $coche = null;
        if ($id_Coche != "null") {
            $coche = Coches::find($id_Coche);
        }
        return view('empleado.modificarcoche', ['coche' => $coche]);
    }
    
    /**
     * Modifica los datos pasado por parámetros del coche
     *
     * @param  mixed $request
     * @return void
     */
    public function updateCoche(Request $request)
    {
        $coche = null;
        //$path=null;
        $img = null;
        $exten = null;
        if ($request->input('id_Coche') != null) {
            $coche = Coches::find($request->input('id_Coche'));
            $img = $coche->marca . " " . $coche->modelo;
            $coche->fill($request->all());
            if ($request->file('archivo') != null & $img!=null) {
                Storage::disk('public')->delete($coche -> imagen);
            }
        } else {
            $coche = new Coches($request->all());
            $img = $request->input('marca') . " " . $request->input('modelo');
        }
        if ($request->file('archivo') != null) {
            
            $file = $request->file('archivo');
            $exten = $file->extension();
            $path = $request->file('archivo')->storePubliclyAs(
                'storage',
                $img . "." . $exten,
                'public'
            );
            $coche->fill(['imagen' => "/" . $path]);
        }
        
        $coche->save();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }
    
    /**
     * Elimina el coche según el id en la base de datos
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyCoche($id)
    {
        $coche = Coches::find($id);
        Storage::disk('public')->delete($coche -> imagen);
        $coche->delete();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }


    
    /**
     * Vista de todos los alquileres
     *
     * @return void
     */
    public function tablaAlquileres()
    {
        $alquileres = Alquiler::alquileresAll();
        return view('empleado.alquileres', ['alquileres' => $alquileres]);
    }
    
    /**
     * Prepara la vista para editar un alquiler
     *
     * @param  mixed $id_Alquiler
     * @return void
     */
    public function editAlquiler($id_Alquiler)
    {
        $alquiler = Alquiler::alquileresFind($id_Alquiler);
        return view('empleado.modificaralquiler', ['alquiler' => $alquiler[0]]);
    }
    
    /**
     * Modifica los datos pasado por parámetros del alquiler
     *
     * @param  mixed $request
     * @param  mixed $id_Alquiler
     * @return void
     */
    public function updateAlquiler(Request $request, $id_Alquiler)
    {
        $alquiler = Alquiler::find($id_Alquiler);
        $observacion = "";
        $estado = $alquiler['estado'];
        if ($request->input('observacion') != null) {
            $observacion = $request->input('observacion');
        }
        if ($request->input('estado') != null) {
            $estado = $request->input('estado');
        }
        $alquiler->fill(['observacion' => $observacion, 'estado' => $estado]);
        $alquiler->save();
        return redirect()->action([EmpleadoController::class, 'tablaAlquileres']);
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
        $alquiler->delete();
        return redirect()->action([EmpleadoController::class, 'tablaAlquileres']);
    }
    
    /**
     * Prepara la vista del perfil
     *
     * @return void
     */
    public function vistaPerfil(){
        return view('empleado.perfil');
    }
}
