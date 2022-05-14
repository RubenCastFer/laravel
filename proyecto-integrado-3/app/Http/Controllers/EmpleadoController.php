<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Coches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{


    public function dashboard()
    {
        return view('empleado.dashboard');
    }

    public function tablaEmpleados()
    {
        return view('empleado.empleados');
    }

    public function editEmpleado($id_Coche)
    {
        $coche = null;
        if ($id_Coche != null) {
            $coche = Coches::find($id_Coche);
        }
        return view('empleado.modificarcoche', ['coche' => $coche]);
    }

    public function updateEmpleado(Request $request)
    {
        $coche = null;
        //$path=null;
        $img = null;
        $exten = null;
        if ($request->input('id_Coche') != null) {
            $coche = Coches::find($request->input('id_Coche'));
            $img = $coche->marca . " " . $coche->modelo;
            $coche->fill($request->all());
            if ($request->file('archivo') != null) {
                Storage::disk('public')->delete($coche -> img);
            }
        } else {
            $coche = new Coches($request->all());
            $img = $request->input('marca') . " " . $request->input('modelo');
        }
        if ($request->file('archivo') != null) {
            //$path=$request->file('archivo')->store('storage');
            $file = $request->file('archivo');
            $exten = $file->extension();
            $path = $request->file('archivo')->storePubliclyAs(
                'storage',
                $img . "." . $exten,
                'public'
            );
            $coche->fill(['imagen' => "/" . $path]);
        }
        //$coche->fill(['imagen'=>$path]);
        $coche->save();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }

    public function destroyEmpleado($id)
    {
        $coche = Coches::find($id);
        Storage::disk('public')->delete($coche -> imagen);
        $coche->delete();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }



    public function tablaCoches()
    {
        $coches = Coches::all();
        return view('empleado.coches', ['coches' => $coches]);
    }

    public function editCoche($id_Coche)
    {
        $coche = null;
        if ($id_Coche != null) {
            $coche = Coches::find($id_Coche);
        }
        return view('empleado.modificarcoche', ['coche' => $coche]);
    }

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
            //$path=$request->file('archivo')->store('storage');
            $file = $request->file('archivo');
            $exten = $file->extension();
            $path = $request->file('archivo')->storePubliclyAs(
                'storage',
                $img . "." . $exten,
                'public'
            );
            $coche->fill(['imagen' => "/" . $path]);
        }
        //$coche->fill(['imagen'=>$path]);
        $coche->save();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }

    public function destroyCoche($id)
    {
        $coche = Coches::find($id);
        Storage::disk('public')->delete($coche -> imagen);
        $coche->delete();
        return redirect()->action([EmpleadoController::class, 'tablaCoches']);
    }



    public function tablaAlquileres()
    {
        $alquileres = Alquiler::all();
        return view('empleado.alquileres', ['alquileres' => $alquileres]);
    }

    public function editAlquiler($id_Alquiler)
    {
        $alquiler = Alquiler::find($id_Alquiler);
        return view('empleado.modificaralquiler', ['alquiler' => $alquiler]);
    }

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
}
