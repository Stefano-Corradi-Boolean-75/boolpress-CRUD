<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1. prendo tutti i post e li ciclo
        //2. ad ogni ciclo estraggo un id random dalla tabella catogories
        //3. faccio l'update del post del ciclo con l'id della categoria
        $posts = Post::all();
        foreach($posts as $post){
            $category_id = Category::inRandomOrder()->first()->id;
            $post->category_id = $category_id;
            $post->update();
        }
    }
}
