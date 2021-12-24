<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            [
                'email' => 'customer1@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'email' => 'customer2@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('abcd1234'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
