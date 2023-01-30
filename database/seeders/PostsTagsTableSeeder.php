<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++){

            // estraggo random un post
            $post = Post::inRandomOrder()->first();

            // estraggo un ID random dai tag
            $tag_id = Tag::inRandomOrder()->first()->id;

            // inserisco il dato nella tabella ponte
            // con ->attach viene inserita la relazione nella tabella ponte
            // al metodo attach posso passare un sigolo ID o un array di ID
            $post->tags()->attach($tag_id);
        }
    }
}
