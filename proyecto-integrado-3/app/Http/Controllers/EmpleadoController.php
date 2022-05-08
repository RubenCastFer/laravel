<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Coches;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    
    
    public function dashboard()
    {
        return view('empleado.dashboard');
    }
    
    public function tablaEmpleados(){
        return view('empleado.empleados');
    }

    public function tablaCoches(){
        $coches = Coches::all();
        return view('empleado.coches', ['coches'=>$coches]);
    }

    public function editCoche($id_Coche){
        $coche = Coches::find($id_Coche);
        return view('empleado.modificarcoche', ['coche' => $coche]);
    
    }

    public function updateCoche(Request $request, $id_Coche){
        $coche = Coches::find($id_Coche);

    
    }

    public function tablaAlquileres(){
        $alquileres = Alquiler::all();
        return view('empleado.alquileres', ['alquileres'=>$alquileres]);
    }

    public function editAlquiler($id_Alquiler){
        $alquiler = Alquiler::find($id_Alquiler);
        return view('empleado.modificaralquiler', ['alquiler' => $alquiler]);

    }

    public function updateAlquiler(Request $request, $id_Alquiler){
        $alquiler = Alquiler::find($id_Alquiler);
        $observacion="";
        $estado=$alquiler['estado'];
        if ($request->input('observacion')!=null) {
            $observacion=$request->input('observacion');
        }
        if ($request->input('estado')!=null) {
            $estado=$request->input('estado');
        }
        $alquiler->fill(['observacion'=>$observacion,'estado'=>$estado]);
        $alquiler->save();
        return redirect()->action([EmpleadoController::class, 'tablaAlquileres']);
    }
}
