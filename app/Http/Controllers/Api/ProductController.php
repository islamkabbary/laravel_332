<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRecource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate($request->query("limit"));
        // return response()->json($products);
        return ApiResponse::success(ProductRecource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->authorize("create");
        $data = $request->validate([
            "name" => "required|string|min:6",
            "price" => "required|numeric",
            "image" => "nullable|image|mimes:png,jpg,jpeg|max:2048",
        ]);
        try {
            $data['created_by'] = 1;
            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $oImage = $image->getClientOriginalName();
                $path = Storage::disk("public")->putFileAs("products_imgs", $image, $oImage);
            }
            $data['image'] = $path;
            $product = Product::create($data);
            return ApiResponse::success(new ProductRecource($product), code: 201);
        } catch (\Throwable $th) {
            Log::channel("test")->error($th->getMessage() . $th->getFile() . $th->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ApiResponse::success(new ProductRecource($product));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
