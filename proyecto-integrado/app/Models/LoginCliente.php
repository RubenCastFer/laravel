<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginCliente extends Authenticatable
{
    use HasFactory;

    protected $table = "cliente";

    protected $fillable=['id_Cliente','correo','contrasenya'];
    protected $hidden = ['password',  'remember_token'];


}
