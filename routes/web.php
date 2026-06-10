<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get("hello", function () {
    return "<h1>Hello World</h1>";
});

// Route::post("test-post", function () {
//     return "<h1>Hello World</h1>";
// });

Route::get("user/{id}", function ($id) {
    return "user ID => $id";
})->where('id', '[0-9]+');

Route::get("product/{category}/{id}", function ($category, $id) {
    return "Category => $category - Product_id => $id";
})->where(['id' => '[0-9]+', 'category' => '[a-z]+']);


Route::get("user/{name?}", function ($name = "GUEST") {
    return "user Name => $name";
})->where('name', '[a-z]+');


// Route::get('/home', function () {
//     $name = "ALi";
//     $age = 30;
//     return view('home',['user_name' => $name,'age' => $age , "skills" => ["HTML","CSS","MySQL","PHP","Laravel"]]);
//     // return view('test.test', compact('name'));
//     // return view('test.test')->with('user_name', $name);
// });
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::get('/home', [PageController::class,'home']);
Route::get('/shop', [PageController::class,'hamada']);
Route::get('/contact-us', [PageController::class,'contact']);
Route::post('/create-contact', [PageController::class,'create_contact'])->name("create_contact");