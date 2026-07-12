<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/api-product', function () {
    $response = Http::get("https://dummyjson.com/products");
    return response()->json($response->json());
});

Route::get('/add-product', function () {
    $response = Http::post("https://dummyjson.com/products/add", [
        "title" => 'amazon product',
        "description" => 'description description amazon product',
    ]);
    return response()->json($response->json());
});


Route::apiResource("products", ProductController::class);
