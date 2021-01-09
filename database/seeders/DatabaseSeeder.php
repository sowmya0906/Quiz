<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'student1' => 'admin',
            'student2'=>'admin',
            'unique_id' => '100W999',
            'phone'=>'12344444444',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role'=>1,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
