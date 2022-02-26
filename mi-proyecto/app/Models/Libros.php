<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    protected $table="libros";
    protected $primaryKey = 'isbn';
    protected $fillable=['isbn','titulo','autor','idioma','publicacion','editorial'];
   

    public function obtenerLibros(){
        return Libros::all();
    }

    public function obtenerLibro($isbn){
        return Libros::find($isbn);
    }
}
