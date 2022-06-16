<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * EmpleadoAuth
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class EmpleadoAuth extends Authenticatable
{
    use HasFactory;
    protected $table = "empleado";
    protected $primaryKey = 'id_Empleado';
    protected $fillable = ['id_Empleado', 'name', 'apellidos', 'email', 'password', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto'];
    protected $hidden = ['password','remember_token','email_verified_at','created_at','updated_at'];
    
    /**
     * empleado
     *
     * @param  mixed $email
     * @return void
     */
    static public function empleado($email)
    {
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->where('email', $email)->get();
    }
    
    /**
     * Devuelve todos los datos de los empleados a excepción de la contraseña
     *
     * @return void
     */
    static public function allEmpleados(){
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->get();
    }
    
    /**
     * Devuelve todos los datos del empleado a excepción de la contraseña
     *
     * @param  mixed $id_Empleado
     * @return void
     */
    static public function findEmpleado($id_Empleado){
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->where('id_Empleado', $id_Empleado)->get();
    }
        
    /**
     * passwordDNI
     *
     * @param  mixed $email
     * @return void
     */
    static public function passwordDNI($email)
    {
        return DB::table('empleado')->select('password','dni')->where('email', $email)->get();
    }
}
