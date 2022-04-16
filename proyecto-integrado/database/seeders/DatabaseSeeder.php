<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // contraseña: usuario1234
        include "agencia_alquiler.php";
          
        foreach ($clientes as $cliente) {
            DB::table('cliente')->insert([
                'id_Cliente' => $cliente['id_Cliente'],
                'nombre' => $cliente['nombre'],
                'apellidos' => $cliente['apellidos'],
                'correo' => $cliente['correo'],
                'contrasenya' => '$2y$10$48jXdm53NoV9cHnApThNEedpZKh2sCIAwegNmCbnlQ3/32UvAJmwe',
                'dni' => $cliente['dni'],
                'telefono' => $cliente['telefono'],
                'pais' => $cliente['pais'],
                'provincia' => $cliente['provincia'],
                'ciudad' => $cliente['ciudad'],
                'cp' => $cliente['cp'],
                'calle' => $cliente['calle']
            ]);
        }

        foreach ($coches as $coche) {
            DB::table('coche')->insert([
                'id_Coche' => $coche['id_Coche'],
                'bastidor' => $coche['bastidor'],
                'marca' => $coche['marca'],
                'modelo' => $coche['modelo'],
                'color' => $coche['color'],
                'matricula' => $coche['matricula'],
                'imagen' => $coche['imagen'],
                'estado' => $coche['estado'],
                'precio' => $coche['precio']
            ]);
        }

        foreach ($empleados as $empleado) {
            DB::table('empleado')->insert([
                'id_Empleado' => $empleado['id_Empleado'],
                'nombre' => $empleado['nombre'],
                'apellidos' => $empleado['apellidos'],
                'correo' => $empleado['correo'],
                'contrasenya' => '$2y$10$48jXdm53NoV9cHnApThNEedpZKh2sCIAwegNmCbnlQ3/32UvAJmwe',
                'dni' => $empleado['dni'],
                'telefono' => $empleado['telefono'],
                'pais' => $empleado['pais'],
                'provincia' => $empleado['provincia'],
                'ciudad' => $empleado['ciudad'],
                'cp' => $empleado['cp'],
                'calle' => $empleado['calle'],
                'puesto' => $empleado['puesto']
            ]);
        }

        foreach ($alquileres as $alquiler) {
            DB::table('alquiler')->insert([
                'id_Alquiler' => $alquiler['id_Alquiler'],
                'id_Cliente' => $alquiler['id_Cliente'],
                'id_Coche' => $alquiler['id_Coche'],
                'precio_total' => $alquiler['precio_total'],
                'fecha_contrato' => $alquiler['fecha_contrato'],
                'fecha_inicio' => $alquiler['fecha_inicio'],
                'fecha_fin' => $alquiler['fecha_fin'],
                'observacion' => $alquiler['observacion'],
                'estado' => $alquiler['estado'],
                
            ]);
        }
    }
}
