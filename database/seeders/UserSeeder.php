<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //masukan database ke admin
        User::create([
            'nama'=>'Administrator',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'password'=> Hash::make('admin'),//isi password akan di  hash dengan algoritma bcrpyt
            'status'=>'aktif',
            'last_login' => now() //built library menanmpilkan tanggal saat ini
        ]);
        //panggil user factory,generate sebanyak 50 data
        User::factory(50)->create();
    }
}

