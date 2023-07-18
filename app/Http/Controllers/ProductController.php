<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $product = product::query();
        // // filter by name

        // $product ->when($request->name,function )

        return view('product.index', [
            "judul" => "Product"
        ]);
    }
    public function create()
    {
        $categories = Category::all();

        return view('product.create', [
            "judul" => "Product"
        ], compact('categories'));
    }
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'stok' => $request->stok,
            'category_id' => $request->category
        ]);
        return redirect('/product');
    }
}
