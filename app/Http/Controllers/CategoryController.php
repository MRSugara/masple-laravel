<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', [
            "judul" => "Kategori"
        ], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect('/kategori');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $categories = Category::find($id);
        $categories = Category::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect('/kategori');
    }
}
