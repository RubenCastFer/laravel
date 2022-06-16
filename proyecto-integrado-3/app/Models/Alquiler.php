<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Alquiler
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class Alquiler extends Model
{
    use HasFactory;
    protected $table = "alquiler";
    protected $primaryKey = 'id_Alquiler';
    protected $fillable = ['id_Alquiler', 'id_Cliente', 'id_Coche', 'precio_total', 'fecha_contrato', 'fecha_inicio', 'fecha_fin', 'observacion', 'estado'];
    
    /**
     * Devuelve todos los datos de los alquileres según 
     * el id del cliente, así como algunos datos del 
     * coche correspondiente 
     *
     * @param  mixed $id_Cliente
     * @return void
     */
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
    
    /**
     * Devuelve todos los datos de los alquileres, así como algunos datos del 
     * coche y cliente correspondiente
     *
     * @return void
     */
    static public function alquileresAll(){
        return DB::select('SELECT id_Alquiler, alquiler.id_Cliente, alquiler.id_Coche, precio_total, fecha_contrato, fecha_inicio, fecha_fin, observacion, alquiler.estado, cliente.name, cliente.apellidos, coche.marca, coche.modelo 
                            FROM alquiler 
                            INNER JOIN coche 
                            ON alquiler.id_Coche=coche.id_Coche 
                            INNER JOIN cliente 
                            ON alquiler.id_Cliente=cliente.id_Cliente;
        ');
    }
    
    /**     
     * Devuelve todos los datos de alquiler, así como algunos datos del 
     * coche y cliente correspondiente
     *
     * @param  mixed $id_Alquiler
     * @return void
     */
    static public function alquileresFind($id_Alquiler){
        return DB::select('SELECT id_Alquiler, alquiler.id_Cliente, alquiler.id_Coche, precio_total, fecha_contrato, fecha_inicio, fecha_fin, observacion, alquiler.estado, cliente.name, cliente.apellidos, cliente.email, coche.marca, coche.modelo 
                            FROM alquiler 
                            INNER JOIN coche 
                            ON alquiler.id_Coche=coche.id_Coche 
                            INNER JOIN cliente 
                            ON alquiler.id_Cliente=cliente.id_Cliente
                            WHERE alquiler.id_Alquiler=:id_Alquiler',
                            ['id_Alquiler'=>$id_Alquiler]);
    }
    // SELECT `id_Alquiler`, alquiler.id_Cliente, alquiler.id_Coche, `precio_total`, `fecha_contrato`, `fecha_inicio`, `fecha_fin`, `observacion`, alquiler.estado, cliente.name, cliente.apellidos, coche.marca, coche.modelo FROM `alquiler` INNER JOIN coche ON alquiler.id_Coche=coche.id_Coche INNER JOIN cliente ON alquiler.id_Cliente=cliente.id_Cliente;
}
