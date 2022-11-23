<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pack_types')->insert(array(
            ['name' => 'Sólo pizzas'],
            ['name' => 'Pizzas y ensaladas'],
            ['name' => 'Ensaladas, pizzas y pastas'],
            ['name' => 'Tablas de quesos y carnes frías, ensaldas y pizzas'],
            ['name' => 'Tablas de quesos y carnes frías, pizzas y pastas'],
            ['name' => 'Tablas de quesos y carnes frías, ensaladas, pizzas y pastas'],
        ));
    }
}
