<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

use Illuminate\Support\Facades\DB;

class Libros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libros')->insert([
            'isbn' => 'absc123456789',
            'titulo' => 'Harry Potter y la piedra filosofal',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'1997-07-26',
            'editorial'=>0
        ],);

        DB::table('libros')->insert([
            'isbn' => 'absd123456790',
            'titulo' => 'Harry Potter y la cámara secreta',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'1998-07-02',
            'editorial'=>0
        ]);

        DB::table('libros')->insert([
            'isbn' => 'absd123456791',
            'titulo' => 'Harry Potter y el prisionero de Azkaban',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'1999-07-08',
            'editorial'=>0
        ]);

        DB::table('libros')->insert([
            'isbn' => 'absd123456792',
            'titulo' => 'Harry Potter y el cáliz de fuego',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'2000-07-08',
            'editorial'=>0
        ]);

        DB::table('libros')->insert([
            'isbn' => 'absd123456793',
            'titulo' => 'Harry Potter y la Orden del Fénix',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'2003-07-21',
            'editorial'=>0
        ]);

        DB::table('libros')->insert([
            'isbn' => 'absd123456794',
            'titulo' => 'Harry Potter y el misterio del príncipe',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'2005-07-16',
            'editorial'=>0
        ]);

        DB::table('libros')->insert([
            'isbn' => 'absd123456795',
            'titulo' => 'Harry Potter y las reliquias de la Muerte',
            'autor' => 'J. K. Rowling',
            'idioma'=> 'Ingles',
            'publicacion'=>'2007-07-21',
            'editorial'=>0
        ]);
    }
}
