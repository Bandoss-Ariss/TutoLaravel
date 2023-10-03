<?php

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


