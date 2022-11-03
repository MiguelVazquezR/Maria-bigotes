<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            ['name' => 'Las entradas', 'created_at' => now()],
            ['name' => 'Las ensaladas', 'created_at' => now()],
            ['name' => 'Las tablas', 'created_at' => now()],
            ['name' => 'Algo más', 'created_at' => now()],
            ['name' => 'Las pastas', 'created_at' => now()],
            ['name' => 'Las pizzas clásicas', 'created_at' => now()],
            ['name' => 'Las pizzas Gourmet', 'created_at' => now()],
            ['name' => 'Las bebidas', 'created_at' => now()],
            ['name' => 'Las cervezas', 'created_at' => now()],
            ['name' => 'Los vinos', 'created_at' => now()],
        ));
    }
}
