<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate($request->query("limit"));
        // return response()->json($products);
        // return ApiResponse::success($products);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize("create");
        return view("products.create");
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
                Storage::disk("public")->putFileAs("products_imgs", $image, $oImage);
            }
            $product = Product::create($data);
            return ApiResponse::success($product, code: 201);
            // return redirect()->to("/products")->with("success", "Product Create Success");
        } catch (\Throwable $th) {
            Log::channel("test")->error($th->getMessage() . $th->getFile() . $th->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Log::info($product);
        // return ApiResponse::success($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize("delete");
    }
}
