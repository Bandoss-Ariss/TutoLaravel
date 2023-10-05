<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home');

Route::get('/home/{id}/{flag}', function (Request $request,string $id, string $flag) {

    $array = [
        "route" => $request->route()->uri,
        "url" => $request->url()
    ];
    // var_dump($array);
    // die();
    // $request->dd(array_keys($array));
    return view('home');
})->whereAlpha('nom')->name('home');

Route::get("/login", function () {
    return redirect()->route('home', ['id'=>109, "flag"=>"false"]);
});

Route::get("/create-post", function () {
    // Post::create([
    //     'title'=>"Ma première publication",
    //     'author' => "Bandoss Ariss",
    //     "date" => date('Y-m-d'),
    //     "content" => "Ceci est une publication test"
    // ]);

    $post = new Post();
    $post->title = "Ma seconde publiation";
    $post->date = now();
    $post->author = "Ali Peter";
    $post->content = "Ceci esst un test de publication";

    $post->save();
    return "<h1>Bien enregistré";
});


Route::get("/update-post/{id}", function (string $id) {
    // Post::create([
    //     'title'=>"Ma première publication",
    //     'author' => "Bandoss Ariss",
    //     "date" => date('Y-m-d'),
    //     "content" => "Ceci est une publication test"
    // ]);

    $post = Post::findOrFail($id);
    $post->title = "Pubication éditée";
    $post->date = now();
    $post->author = "By Edition";
    $post->content = "Ceci esst un test de publication éditéeeeeee";

    $post->save();
    return redirect()->route("posts");
})->whereNumber("id");


Route::get('/posts', function () {
    $posts = Post::all();
    //$posts = Post::where("date",">","2005-01-01")->limit(30)->get();
    return view('posts', ["posts"=>$posts, "count"=>count($posts)]);
})->name("posts");

Route::get('/post/{id}', function (string $id) {
    $post = Post::findOrFail($id);
    return $post;
})->whereNumber("id");