<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
        DB::table('tags')->insert([
            'name' => 'Laravel',
            'color' => $color[array_rand($color)],
        ]);

        DB::table('tags')->insert([
            'name' => 'PHP',
            'color' => $color[array_rand($color)],
        ]);

        DB::table('tags')->insert([
            'name' => 'Education',
            'color' => $color[array_rand($color)],
        ]);

        DB::table('tags')->insert([
            'name' => 'Personal',
            'color' => $color[array_rand($color)],
        ]);

    }
}
