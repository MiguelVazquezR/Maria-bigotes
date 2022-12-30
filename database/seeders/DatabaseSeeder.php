<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            // ProductSeeder::class,
            EventTypeSeeder::class,
            ServiceTypeSeeder::class,
            PackTypeSeeder::class,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@mariabigotes.com',
            'password' => bcrypt('MBAdmin!*'),
        ]);

        Rate::factory(15)->create();
    }
}
