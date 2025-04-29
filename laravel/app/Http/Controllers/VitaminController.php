<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use Illuminate\Http\Request;

class VitaminController extends Controller 
{
    // Menampilkan semua vitamin
    public function index()
    {
        $vitamin = Vitamin::all();
        return view('admin-side.vitamin.index', compact('vitamin'));
    }
    
    // Menampilkan form tambah vitamin
    public function create()
    {
        return view('admin-side.vitamin.create');
    }
    
    // Menyimpan vitamin baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_vitamin' => 'required|string|max:255',
        ]);
        
        Vitamin::create([
            'nama_vitamin' => $request->nama_vitamin,
        ]);
        
        return redirect()->route('vitamin.index')->with('success', 'Vitamin berhasil ditambahkan.');
    }
    
    // Menampilkan form edit vitamin
    public function edit($id)
    {
        // Gunakan id_vitamin untuk mencari data
        $vitamin = Vitamin::where('id_vitamin', $id)->firstOrFail();
        return view('admin-side.vitamin.edit', compact('vitamin'));
    }
    
    // Menyimpan perubahan vitamin
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_vitamin' => 'required|string|max:255',
        ]);
        
        // Gunakan id_vitamin untuk mencari data
        $vitamin = Vitamin::where('id_vitamin', $id)->firstOrFail();
        $vitamin->update([
            'nama_vitamin' => $request->nama_vitamin,
        ]);
        
        return redirect()->route('vitamin.index')->with('success', 'Vitamin berhasil diperbarui.');
    }
    
    // Menghapus vitamin
    public function destroy($id)
    {
        // Gunakan id_vitamin untuk mencari data
        $vitamin = Vitamin::where('id_vitamin', $id)->firstOrFail();
        $vitamin->delete();
        return redirect()->route('vitamin.index')->with('success', 'Vitamin berhasil dihapus.');
    }
}