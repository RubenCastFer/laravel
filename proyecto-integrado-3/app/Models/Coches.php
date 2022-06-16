<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Coches
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class Coches extends Model
{
    use HasFactory;
    protected $table = "coche";
    protected $primaryKey = 'id_Coche';
    protected $fillable = ['id_Coche', 'bastidor', 'marca', 'modelo', 'color', 'matricula','imagen', 'estado', 'precio'];
    
    /**
     * Recoge solo los coches libres para las fechas especificadas
     *
     * @param  mixed $recogida
     * @param  mixed $devolucion
     * @return void
     */
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
    
    /**
     * coche especifico
     *
     * @param  mixed $id_Coche
     * @return void
     */
    static public function cocheEspecifico($id_Coche){
        return DB::select('SELECT *
        FROM coche
        WHERE id_Coche=:id_Coche',['id_Coche'=>$id_Coche]);
    }

}
