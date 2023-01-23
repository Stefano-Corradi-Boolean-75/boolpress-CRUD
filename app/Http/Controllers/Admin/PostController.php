<?php

namespace App\Http\Controllers\Admin; // <- se spostato a mano aggiungere Admin nel namespace

use App\Http\Controllers\Controller; // <----- a aggiungere se il controller lo abbiamo spostato a mano
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $posts = Post::where('title','like',"%$search%")->paginate(10);
        }else{
            $posts = Post::orderBy('id','desc')->paginate(10);
        }
        $direction = 'desc';
        return view('admin.posts.index', compact('posts', 'direction'));
    }

    public function categories_post(){

        $categories = Category::all();
        return view('admin.posts.list_category_post', compact('categories'));
    }

    public function orderby($column, $direction){

        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $posts = Post::orderby($column, $direction)->paginate(10);

        return view('admin.posts.index', compact('posts', 'direction'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post_data = $request->all();

        $post_data['slug'] = Post::generateSlug($post_data['title']);

        // se è presente il file immagine lo salvo nel filsystem e nel db
        if(array_key_exists('image',$post_data)){

            // salvo il nome originale
            $post_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo il file sul filesystem e il path in $post_data['image]
            $post_data['image'] = Storage::put('uploads', $post_data['image']);

        }

        //dd($post_data);


        /*$new_post = new Post();
        $new_post->fill($post_data);
        $new_post->save();*/

        // soluzione compatta per il save
        $new_post = Post::create($post_data);

        return redirect()->route('admin.posts.show',$new_post)->with('message','Post creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post_data = $request->all();
        if($post_data['title'] != $post->title){
            $post_data['slug'] = Post::generateSlug($post_data['title']);
        }else{
            $post_data['slug'] = $post->slug;
        }


        if(array_key_exists('image',$post_data)){

            // se invio una nuova immagine devo eliminare la vecchia dal filesystem
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $post_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $post_data['image'] = Storage::put('uploads', $post_data['image']);
        }

        $post->update($post_data);

        return redirect()->route('admin.posts.show',$post)->with('message','Post aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted','Post eliminato correttamente');
    }
}
