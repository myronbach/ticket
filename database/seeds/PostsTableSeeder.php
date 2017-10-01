<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index){
            $title = $faker->text(80);

            Post::create([
                'title' => $title,
                'content' => $faker->paragraph(30),
                'slug' => Str::slug($title, '-'),
                'status' => 1,
                'user_id' => $faker->numberBetween($min = 1, $max = 3),
            ]);
        }
    }
}
