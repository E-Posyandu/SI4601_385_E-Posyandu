<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class CreateJadwalKegiatanController extends Controller
{
    // Membuat Jadwal Kegiatan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'id_petugasKader'  => 'required|integer',
            'id_posyandu'      => 'required|integer',
        ]);

        $jadwal = Jadwal::create($validated);

        return response()->json([
            'message' => 'Jadwal kegiatan berhasil ditambahkan.',
            'data'    => $jadwal
        ], 201);
    }

    // Melihat Jadwal Kegiatan
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('admin-side.jadwal-kegiatan.index', compact('jadwals'));
    }

    // Memperbaharui Jadwal Kegiatan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal-kegiatan.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Menghapus Jadwal Kegiatan
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-kegiatan.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
