<?php

use App\Http\Controllers\CommentController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get('/home', function (Request $request) {

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

Route::get("/create-post", [PostController::class, 'create'])->name('post.create');

Route::post("/post",[PostController::class, 'store']);


Route::get("/update-post/{id}", [PostController::class, 'update'])->whereNumber("id");


Route::get('/posts', [PostController::class, 'index'])->name("posts");

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get("/post_delete/{id}", [PostController::class, 'delete'])->name("post.delete");

Route::resource("comments", CommentController::class);