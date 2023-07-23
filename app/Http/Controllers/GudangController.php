<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
use App\Models\Product;
use App\Models\Satuan;
use App\Models\User;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::all();
        $product = Product::all();
        $gudang = Gudang::all();
        return view('gudang.index', [
            'judul' => 'Gudang',
        ], compact('product', 'gudang'));
    }
    public function create(Request $request)
    {
        //
    }
    public function store(Request $request)
    {
        $product = Product::all();
        $satuan = Satuan::all();
        $user = User::all();
        $gudang = Gudang::create([
            'product_id' => $request->product,
            'stok' => $request->stok,
            // 'user_id' => Auth::user()->id
        ]);
        return redirect('/gudang');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $user = User::all();
        $gudang = Gudang::find($id);
        return view('gudang.show', [
            'judul' => 'Gudang',
            'gudang' => $gudang
        ], compact('gudang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gudang $gudang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gudang $gudang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gudang $gudang)
    {
        //
    }
}
