<?php

use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_tag')->insert([
            'blog_id' => 1,
            'tag_id' => 1,
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 2,
            'tag_id' => 2,
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 3,
            'tag_id' => 3,
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 4,
            'tag_id' => 1,
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 5,
            'tag_id' => 2,
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 6,
            'tag_id' => 4,
        ]);
    }
}
