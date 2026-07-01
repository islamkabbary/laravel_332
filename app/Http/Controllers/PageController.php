<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        // $products = Product::with("createdBy")->get();
        $products = Product::paginate(4);
        // $products = DB::table("products")->paginate(4);
        // dd($products);
        return view('home', ['products' => $products]);
    }
    public function hamada()
    {
        return view('shop');
    }
    public function contact()
    {
        return view('contact-us');
    }
    public function create_contact(Request $request)
    {
        dd($request->message);
    }
}
