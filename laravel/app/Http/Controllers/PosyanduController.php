<?php

namespace App\Http\Controllers;

use App\Models\posyandu;
use App\Models\admin;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    // Menampilkan semua data posyandu
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $posyandus = Posyandu::with('admin')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama_posyandu', 'like', '%' . $keyword . '%');
            })
            ->get();
        return view('admin-side.posyandu.index', compact('posyandus'));
    }

    // Menampilkan form tambah posyandu
    public function create()
    {
        $admins = Admin::all();
        return view('admin-side.posyandu.create', compact('admins'));
    }

    // Menyimpan data posyandu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat_posyandu' => 'required|string',
            'id_admin' => 'required|exists:table_admin,id_admin'
        ]);

        Posyandu::create($request->all());
        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil ditambahkan');
    }

    // Menampilkan detail posyandu
    public function show($id)
    {
        $posyandu = Posyandu::with('admin')->findOrFail($id);
        return view('admin-side.posyandu.show', compact('posyandu'));
    }

    // Menampilkan form edit posyandu
    public function edit($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $admins = admin::all();
        return view('admin-side.posyandu.edit', compact('posyandu', 'admins'));
    }

    // Update data posyandu
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat_posyandu' => 'required|string',
            'id_admin' => 'required|exists:table_admin,id_admin'
        ]);

        $posyandu = Posyandu::findOrFail($id);
        $posyandu->update($request->all());
        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil diperbarui');
    }

    // Menghapus data posyandu
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();
        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil dihapus');
    }
}
