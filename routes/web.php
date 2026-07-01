<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', [PageController::class, 'home']);
Route::get('/shop', [PageController::class, 'hamada']);
Route::get('/contact-us', [PageController::class, 'contact']);
Route::post('/create-contact', [PageController::class, 'create_contact'])->name("create_contact");







Route::get("test", function () {
    // select * from products where id = 1;
    // $p1 = Product::where("name", "ali")->where("active", true)->get();
    // foreach($p1 as $p){
    //     dd($p->name);
    // }

    // $p1 = new Product();
    // $p1->name = "product 1";
    // $p1->price = "10.99";
    // $p1->created_by = 1;
    // $p1->active = false;
    // $p1->save();


    // $p1 = Product::find(1);
    // $p1->name = "pro 22222222";
    // $p1->save();
    // dD($p1);

    // $p1 = Product::find(1)->delete();

    // Product::create([
    //     "name" => "pro 1",
    //     "price" => "100.99"
    // ]);

    // $pro1 = Product::active()->get();
    // $pro1 = Product::orderBy("created_at","desc")->get();
    // $pro1 = Product::active()->where("name", "ali")->orderBy("created_at","desc")->get();


    // $p1 = Product::find(2)->details()->get();
    // $p1 = Product::find(2)->details()->createMany([
    //     ["d1"],
    //     ["d2"],
    //     ["d3"]
    // ]);
    // $p1 = Product::find(2)->details()->update([

    // ]);
    // $p1 = Product::find(2)->details()->delete();
    // dd(category::find(1)->products);
    // dd(Product::find(1)->categories);
    // $p1 = Product::find(2);
    // // $p1->categories()->syncWithoutDetaching([5, 6, 7]);
    // $p1->categories()->detach(2);
    // dd($p1->categories);


    // dd(DB::table("products")->get());
    // dd(DB::table("products")->where('id',1)->first());
    // dd(DB::table("products")->insert([
    //     [
    //         "name" => "pro q 555",
    //         "price" => "500",
    //         "created_by" => "1",
    //     ],
    //     [
    //         "name" => "pro q 666",
    //         "price" => "500",
    //         "created_by" => "1",
    //     ]
    // ]));


    $products = DB::table("products as p")->join('category_product as cp', 'p.id', "=", 'cp.product_id');
});

Route::get('/test-midd', function () {
    return view('dashboard');
})->middleware(['is_admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/create', [ProductController::class, 'create']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

// Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
// Route::put('/products/{id}', [ProductController::class, 'update']);

// Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::resource("products", ProductController::class);
});
