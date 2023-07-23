<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Product;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $satuan = Satuan::all();
        $product = Product::all();
        $categories = Category::all();
        return view('product.index', [
            "judul" => "Product"
        ], compact('product', 'categories', 'satuan'));
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
            'ukuran' => $request->ukuran,
            'category_id' => $request->category,
            'satuan_id' => $request->satuan,
            'warna' => $request->warna,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
        return redirect()->route('product.index');
    }
    public function update(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->update([
            'name' => $request->name,

            'category_id' => $request->category,
            'satuan_id' => $request->satuan,
            'warna' => $request->warna,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
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
