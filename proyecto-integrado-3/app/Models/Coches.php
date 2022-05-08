<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coches extends Model
{
    use HasFactory;
    protected $table = "coche";
    protected $primaryKey = 'id_Coche';
    protected $fillable = ['id_Coche', 'bastidor', 'marca', 'modelo', 'color', 'matricula', 'imagen', 'estado', 'precio'];


    // SELECT *
    // FROM coche
    // WHERE id_Coche NOT IN (
    //     SELECT id_Coche
    // 	FROM alquiler
    // 	WHERE ((alquiler.fecha_inicio <= '2022-04-08 11:00:00') 
    // 	AND (alquiler.fecha_fin >= '2022-04-08 11:00:00')) 
    // 	OR ((alquiler.fecha_inicio <= '2022-04-14 11:00:00')
    // 	AND (alquiler.fecha_fin >= '2022-04-14 11:00:00')))
    static public function cochesLibres($recogida,$devolucion)
    {
        $cochesLibres=DB::select('SELECT *
                                FROM coche
                                WHERE id_Coche NOT IN (
                                    SELECT id_Coche
                                    FROM alquiler
                                    WHERE ((fecha_inicio <= :recogida1) 
                                    AND (fecha_fin >= :recogida2)) 
                                    OR ((fecha_inicio <= :devolucion1)
                                    AND (fecha_fin >= :devolucion2)))',
                                    ['recogida1'=>$recogida,'recogida2'=>$recogida,'devolucion1'=>$devolucion,'devolucion2'=>$devolucion]);
        return $cochesLibres;
    }

    static public function cocheEspecifico($id_Coche){
        return DB::select('SELECT *
        FROM coche
        WHERE id_Coche=:id_Coche',['id_Coche'=>$id_Coche]);
    }

}
