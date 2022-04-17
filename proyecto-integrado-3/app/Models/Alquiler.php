<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alquiler extends Model
{
    use HasFactory;
    protected $table = "alquiler";
    protected $primaryKey = 'id_Alquiler';
    protected $fillable = ['id_Alquiler', 'id_Cliente', 'id_Coche', 'precio_total', 'fecha_contrato', 'fecha_inicio', 'fecha_fin', 'observacion', 'estado'];

    static public function alquileres($id_Cliente){
        return DB::select('SELECT id_Alquiler, id_Cliente, alquiler.id_Coche, 
                                    precio_total,fecha_contrato,fecha_inicio,fecha_fin,
                                    observacion,alquiler.estado as estado_alquiler, 
                                    bastidor,marca,modelo,color,matricula,imagen,
                                    coche.estado AS estado_coche,precio 
                            FROM `alquiler` 
                            INNER JOIN coche 
                            ON alquiler.id_Coche=coche.id_Coche 
                            WHERE alquiler.id_Cliente=:id_Cliente',
                            ['id_Cliente'=>$id_Cliente]);
    }
}
