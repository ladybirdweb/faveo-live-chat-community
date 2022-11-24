<?php

namespace Database\Seeders\v_1_0;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Meera',
            'email'=>'meera94191@gmail.com',
            'password'=> Hash::make('Meera@28'),
            'role'=>'admin',
        ]);
    }
}
