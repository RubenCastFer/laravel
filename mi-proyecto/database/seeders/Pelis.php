<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peliculas;
use Illuminate\Support\Facades\DB;

class Pelis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peliculas')->insert([
            'titulo' => 'La Comunidad del Anillo',
            'duracion' => 240,
            'email'=> 'rubenruel@hotmail.com',   
        ]);
        DB::table('peliculas')->insert([
            'titulo' => 'Las dos torres',
            'duracion' => 140,
            'email'=> 'rubenruel@hotmail.com',   
        ]);
    }
}
