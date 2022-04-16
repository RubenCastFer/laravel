<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;
    protected $table = "alquiler";
    protected $fillable = ['id_Alquiler', 'id_Cliente', 'id_Coche', 'precio_total', 'fecha_contrato', 'fecha_inicio', 'fecha_fin', 'observacion', 'estado'];


    //     SELECT id_Coche
    //     FROM alquiler
    //     WHERE ((alquiler.fecha_inicio <= '2022-04-08 11:00:00') 
    //     AND (alquiler.fecha_fin >= '2022-04-08 11:00:00')) 
    //     OR ((alquiler.fecha_inicio <= '2022-04-14 11:00:00')
    //     AND (alquiler.fecha_fin >= '2022-04-14 11:00:00'))


    // SELECT *
    // FROM coche
    // WHERE id_Coche NOT IN (1,2,3)

    // el bueno
    // SELECT *
    // FROM coche
    // WHERE id_Coche NOT IN (
    //     SELECT id_Coche
    // 	FROM alquiler
    // 	WHERE ((alquiler.fecha_inicio <= '2022-04-08 11:00:00') 
    // 	AND (alquiler.fecha_fin >= '2022-04-08 11:00:00')) 
    // 	OR ((alquiler.fecha_inicio <= '2022-04-14 11:00:00')
    // 	AND (alquiler.fecha_fin >= '2022-04-14 11:00:00')))


}
