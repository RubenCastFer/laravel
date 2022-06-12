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
                'name' => $cliente['nombre'],
                'apellidos' => $cliente['apellidos'],
                'email' => $cliente['correo'],
                'password' => $cliente['contrasenya'],
                'dni' => $cliente['dni'],
                'telefono' => $cliente['telefono'],
                'pais' => $cliente['pais'],
                'provincia' => $cliente['provincia'],
                'ciudad' => $cliente['ciudad'],
                'cp' => $cliente['cp'],
                'calle' => $cliente['calle'],
                'remember_token' => 1,

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
                'name' => $empleado['nombre'],
                'apellidos' => $empleado['apellidos'],
                'email' => $empleado['correo'],
                'password' => $empleado['contrasenya'],
                'dni' => $empleado['dni'],
                'telefono' => $empleado['telefono'],
                'pais' => $empleado['pais'],
                'provincia' => $empleado['provincia'],
                'ciudad' => $empleado['ciudad'],
                'cp' => $empleado['cp'],
                'calle' => $empleado['calle'],
                'puesto' => $empleado['puesto'],
                'remember_token' => 1,
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
