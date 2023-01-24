<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++){
            $new_post = new Post();
            $new_post->user_id = User::inRandomOrder()->first()->id;
            $new_post->title = $faker->sentence();
            $new_post->slug = Post::generateSlug($new_post->title);
            $new_post->date = date('Y-m-d');
            $new_post->text = $faker->paragraph(5);
            $new_post->save();
        }
    }
}
