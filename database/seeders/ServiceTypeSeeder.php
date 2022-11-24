<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_types')->insert(array(
            ['name' => 'MESA DE PIZZAS, ENSALADA Y PASTAS: Un servicio más informal, en el que los invitados se paran por sus alimentos (contratación mínima de 60 pizzas, más los platillos que desees agregar)'],
            ['name' => 'BANQUETE A 2 TIEMPOS: contratación mínima de 20 personas hasta 400'],
            ['name' => 'BANQUETE A 3 TIEMPOS: contratación mínima de 20 personas hasta 400'],
            ['name' => 'BANQUETE A 4 TIEMPOS: contratación mínima de 20 personas hasta 400'],
        ));
    }
}
