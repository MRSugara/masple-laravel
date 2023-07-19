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
        $product = Product::all();
        $categories = Category::all();
        return view('product.index', [
            "judul" => "Product"
        ], compact('product', 'categories'));
    }
    public function create()
    {
        // $product = Product::all();
        // compact('product');
        // // return view('product.create', [
        // //     "judul" => "Product"
        // // ], compact('categories'));
    }
    public function store(Request $request)
    {


        $product = Product::all();
        $product = Product::create([
            'name' => $request->name,
            'stok' => $request->stok,
            'category_id' => $request->category
        ]);
        return redirect('/product');
    }
    public function update(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::where('id',$id)->update([
            'name' => $request->name,
            'stok' => $request->stok,
            'category_id' => $request->category
        ]);
        return redirect('/product');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}