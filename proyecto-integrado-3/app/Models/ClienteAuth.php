<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * ClienteAuth
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class ClienteAuth extends Authenticatable
{
    use HasFactory;
    protected $table = "cliente";
    protected $primaryKey = 'id_Cliente';

    protected $fillable = ['id_Cliente', 'name', 'apellidos', 'email', 'password', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle'];
    protected $hidden = ['password','remember_token','email_verified_at','created_at','updated_at'];
    
    /**
     * cliente
     *
     * @param  mixed $email
     * @return void
     */
    static public function cliente($email)
    {
        return DB::table('cliente')->select('id_Cliente', 'name', 'apellidos', 'email', 'dni', 'telefono', 'pais', 'provincia', 'ciudad', 'cp', 'calle')->where('email', $email)->get();
    }
    
    /**
     * password
     *
     * @param  mixed $email
     * @return void
     */
    static public function password($email)
    {
        return DB::table('cliente')->select('password')->where('email', $email)->get();
    }
}
