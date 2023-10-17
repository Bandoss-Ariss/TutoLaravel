<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        //$posts = Post::where("date",">","2005-01-01")->limit(30)->get();
        return view('posts.index', ["posts"=>$posts, "count"=>count($posts)]);
    }

    public function update(string $id) 
    {
        $post = Post::findOrFail($id);
        $post->title = "Pubication éditée";
        $post->date = now();
        $post->author = "By Edition";
        $post->content = "Ceci esst un test de publication éditéeeeeee";
    
        $post->save();
        return redirect()->route("posts");
    }

    public function create()
    {
           // Post::create([
    //     'title'=>"Ma première publication",
    //     'author' => "Bandoss Ariss",
    //     "date" => date('Y-m-d'),
    //     "content" => "Ceci est une publication test"
    // ]);

        return view("posts.create");
    }

    public function store(Request $request) {

        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->content = $request->input('content');
        $post->date = date('Y-m-d');
        $post->save();
        return to_route("post.show", ["id"=>$post->id])->with("success", "publication ajoutée avec succès");
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            return to_route("posts")->with('error', "Cette publication n'existe pas ou a été supprimée");
        }
        return view("posts.show", ["post"=>$post]);
    }

    public function delete(int $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route("posts")->with('error', "Cette publication n'existe pas ou a déja été supprimée");
        }
        $post->delete();
        return to_route("posts")->with('success', "La publication $post->title a bien été supprimée");
    }
}
