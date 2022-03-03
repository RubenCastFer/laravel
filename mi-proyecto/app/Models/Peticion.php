<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;
    protected $table="peticiones";
    protected $primaryKey = 'id';
    protected $fillable=['nombre','mail','titulo'];
    // protected $hidden = ['id'];


    public function obtenerPeticiones(){
        return Peticion::all();
    }

    // public function obtenerPeticion($nombre){
    //     return Peticion::find($nombre);
    // }
}
