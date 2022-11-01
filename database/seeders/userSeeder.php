<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_user')->insert([
            'name'     => 'Meera',
            'mail'     => 'meera94191@gmail.com',
            'password' => Hash::make('meera'),
            'roles'    => 'Admin',
        ]);
    }
}
