<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    protected $table="libros";
    protected $fillable=['isbn','titulo','autor','idioma','publicacion','editorial'];
    protected $hidden = ['id'];

    public function obtenerLibros(){
        return Libros::all();
    }

    public function obtenerLibro($id){
        return Libro::find($id);
    }
}
