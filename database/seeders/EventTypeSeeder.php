<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert(array(
            ['name' => 'Baby shower'],
            ['name' => 'Reunión'],
            ['name' => 'Fiesta infantil'],
            ['name' => 'Pedida'],
            ['name' => 'Primera comunión'],
            ['name' => 'Despedida de soltera'],
            ['name' => 'Graduación'],
            ['name' => 'Revelación de sexo'],
            ['name' => 'Quince años'],
            ['name' => 'Otro'],
        ));
    }
}
