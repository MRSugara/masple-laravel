<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        // $value = User::find('password');
        // $rehash = Hash::needsRehash('password');
        // $hashed = Hash::make('plain-text');

        // dd($rehash);
        $user = User::where('role_id', 2)->get();
        return view('kasir.index', [
            'judul' => 'Kasir',
        ], compact('user'));
    }
    public function store(Request $request)
    {
        $role = Role::find(2);
        $user = User::create([
            'name' => $request->name,
            'role_id' => $role->id,
            'password' => $request->password
        ]);
        return redirect('/kasir');
    }
    public function update(Request $request, $id)
    {

        $role = Role::find(2);
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'role_id' => $role->id,
            'password' => $request->password
        ]);
        return redirect('/kasir');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/kasir');
    }
}
