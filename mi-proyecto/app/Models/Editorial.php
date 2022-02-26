<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;
    protected $table="editorial";
    protected $fillable=['id','nombre','nacionalidad'];


    public function obtenerEditoriales(){
        return Editorial::all();
    }

    public function obtenerEditorial($id){
        return Editorial::find($id);
    }
}
