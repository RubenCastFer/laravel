<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpleadoAuth extends Authenticatable
{
    use HasFactory;
    protected $table = "empleado";
    protected $primaryKey = 'id_Empleado';
    protected $fillable = ['id_Empleado', 'name', 'apellidos', 'email', 'password', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto'];
    protected $hidden = ['password','remember_token','email_verified_at','created_at','updated_at'];

    static public function empleado($email)
    {
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->where('email', $email)->get();
    }

    static public function allEmpleados(){
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->get();
    }

    static public function findEmpleado($id_Empleado){
        return DB::table('empleado')->select('id_Empleado', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle','puesto')->where('id_Empleado', $id_Empleado)->get();
    }
    
    static public function passwordDNI($email)
    {
        return DB::table('empleado')->select('password','dni')->where('email', $email)->get();
    }
}
