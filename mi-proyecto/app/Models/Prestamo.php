<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table="prestamo";
    protected $fillable=['isbn','fechaInicio','fechaFin'];
    protected $hidden = ['id'];

    public function obtenerPrestamos(){
        return Prestamo::all();
    }

    public function obtenerPrestamo($isbn){
        return Prestamo::find($isbn);
    }
}


