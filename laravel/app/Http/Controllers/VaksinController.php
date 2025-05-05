<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;

class VaksinController extends Controller 
{
    // Menampilkan semua vaksin
    public function index()
    {
        $vaksin = Vaksin::all();
        return view('admin-side.vaksin.index', compact('vaksin'));
    }
    
    // Menampilkan form tambah vaksin
    public function create()
    {
        return view('admin-side.vaksin.create');
    }
    
    // Menyimpan vaksin baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_vaksin' => 'required|string|max:255',
        ]);
        
        Vaksin::create([
            'nama_vaksin' => $request->nama_vaksin,
        ]);
        
        return redirect()->route('vaksin.index')->with('success', 'Vaksin berhasil ditambahkan.');
    }
    
    // Menampilkan form edit vaksin
    public function edit($id)
    {
        // Gunakan id_vaksin untuk mencari data
        $vaksin = Vaksin::where('id_vaksin', $id)->firstOrFail();
        return view('admin-side.vaksin.edit', compact('vaksin'));
    }
    
    // Menyimpan perubahan vaksin
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_vaksin' => 'required|string|max:255',
        ]);
        
        // Gunakan id_vaksin untuk mencari data
        $vaksin = Vaksin::where('id_vaksin', $id)->firstOrFail();
        $vaksin->update([
            'nama_vaksin' => $request->nama_vaksin,
        ]);
        
        return redirect()->route('vaksin.index')->with('success', 'Vaksin berhasil diperbarui.');
    }
    
    // Menghapus vaksin
    public function destroy($id)
    {
        try {
            // Gunakan id_vaksin untuk mencari data
            $vaksin = Vaksin::where('id_vaksin', $id)->firstOrFail();
            $vaksin->delete();
            return redirect()->route('vaksin.index')->with('success', 'Vaksin berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Cek apakah error karena foreign key constraint
            if($e->getCode() == "23000") { // Integrity constraint violation
                return redirect()->route('vaksin.index')->with('error', 'Vaksin tidak dapat dihapus karena sedang digunakan oleh data balita.');
            }
            // Jika error lain
            return redirect()->route('vaksin.index')->with('error', 'Terjadi kesalahan saat menghapus vaksin.');
        }
    }
}