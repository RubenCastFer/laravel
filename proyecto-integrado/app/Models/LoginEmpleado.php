<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginEmpleado extends Authenticatable
{
    use HasFactory;

    protected $table = "empleado";

    protected $fillable=['id_Empleado','correo','contrasenya'];
    protected $hidden = ['password',  'remember_token'];


}
