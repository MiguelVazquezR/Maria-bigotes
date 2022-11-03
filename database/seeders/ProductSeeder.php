<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(array(
            ['name' => 'producto 1', 'description' => 'Descripción del producto 1', 'price' => 19.2, 'category_id' => 1],
            ['name' => 'producto 2', 'description' => 'Descripción del producto 2', 'price' => 40.0, 'category_id' => 2],
            ['name' => 'producto 3', 'description' => 'Descripción del producto 3', 'price' => 27.5, 'category_id' => 3],
            ['name' => 'producto 4', 'description' => 'Descripción del producto 4', 'price' => 114.0, 'category_id' => 4],
            ['name' => 'producto 5', 'description' => 'Descripción del producto 5', 'price' => 79.9, 'category_id' => 5],
        ));
    }
}
