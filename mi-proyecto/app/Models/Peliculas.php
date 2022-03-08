<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;
    protected $table="peliculas";
    protected $primaryKey = 'id';
    protected $fillable=['id','titulo','duracion','email'];
    // protected $hidden = ['id'];


    public function obtenerPeliculas(){
        return Peliculas::all();
    }

    public function obtenerPelicula($id){
        return Peliculas::find($id);
    }
}
