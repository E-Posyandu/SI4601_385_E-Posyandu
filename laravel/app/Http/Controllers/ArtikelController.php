<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();
        return view('admin-side.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin-side.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'author' => 'Admin',
            'is_show' => $request->has('is_show') ? 1 : 0,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil disimpan');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin-side.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->content,
            'is_show' => $request->has('is_show') ? 1 : 0,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index');
    }
}
