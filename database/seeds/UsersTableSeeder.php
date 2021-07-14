<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'admin@me.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'name' => 'anisha',
            'is_admin' => false,
            'email' => 'anisha@me.com',
            'password' => bcrypt('anisha123'),
        ]);
    }
}
