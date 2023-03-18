<?php

namespace Database\Seeders;

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
        // panggil semua class untuk generate seednya;
        $this->call([
            UserSeeder::class
        ]);
        //panggil user factory,generate sebanyak 50 data
        
    }
}
