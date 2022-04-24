<?php

namespace App\Http\Controllers;

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
        return view('empleado.coches');
    }

    public function tablaAlquileres(){
        return view('empleado.alquileres');
    }
}
