<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visited;
use App\Models\balita;
use App\Models\petugas;
use App\Models\posyandu;

class VisitedController extends Controller
{ 
    // Tampilkan semua data visited
    public function index(Request $request)
    {
        $query = Visited::query();

        // Filter pencarian nama balita
        if ($request->filled('search')) {
            $query->whereHas('balita', function ($q) use ($request) {
                $q->where('nama_balita', 'like', '%' . $request->search . '%');
            });
        }

        // Filter tanggal penimbangan
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_penimbangan', '>=', $request->tanggal_awal)
                ->whereDate('tanggal_penimbangan', '<=', $request->tanggal_akhir);
        }

        // Ambil data lengkap dengan relasi
        $visiteds = $query->with(['balita', 'posyandu', 'petugas'])->get();

        return view('admin-side.visited.index', compact('visiteds'));
    }


    // Tampilkan form pengisian data visited
    public function create()
    {
        $balitas = Balita::all();
        $posyandus = Posyandu::all();
        $petugas_kaders = petugas::all();
        return view('admin-side.visited.create', compact('balitas','posyandus', 'petugas_kaders'));
    }

    // Simpan data visited baru
    public function store(Request $request)
    {
        $request->validate([
            'id_balita' => 'required|exists:table_balita,id_balita',
            'tanggal_penimbangan' => 'required|date',
            'bulan_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'lingkat_lengan' => 'required|numeric',
            'status_gizi' => 'required|string',
            'asi_esklusif' => 'required|boolean',
            'id_posyandu' => 'required',
            'id_petugas_kader' => 'required',
        ]);

        Visited::create($request->all());
        return redirect()->route('visited.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Tampilkan detail visited berdasarkan id_balita
    public function show($id_balita)
    {
        $visited = Visited::where('id_balita', $id_balita)->get();
        return view('admin-side.visited.show', compact('visited'));
    }

    // Tampilkan form edit data visited
    public function edit($id)
    {
        $visited = Visited::findOrFail($id);
        $balitas = Balita::all();
        return view('admin-side.visited.edit', compact('visited', 'balitas'));
    }

    // Update data visited
    public function update(Request $request, $id)
    {
        $visited = Visited::findOrFail($id);
        $visited->update($request->all());
        return redirect()->route('visited.index')->with('success', 'Data berhasil diupdate');
    }

    // Hapus data visited
    public function destroy($id)
    {
        $visited = Visited::findOrFail($id);
        $visited->delete();
        return redirect()->route('visited.index')->with('success', 'Data berhasil dihapus');
    }
}
