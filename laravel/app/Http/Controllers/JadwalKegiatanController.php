<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalKegiatanController extends Controller
{
    // 1. Lihat daftar jadwal kegiatan
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('admin-side.jadwal-kegiatan.index', compact('jadwals'));
    }

    // 2. Form tambah jadwal kegiatan
    public function create()
    {
        return view('admin-side.jadwal-kegiatan.create');
    }

    // 3. Simpan jadwal kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'id_petugasKader'  => 'required|integer',
            'id_posyandu'      => 'required|integer',
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwal-kegiatan.index')
                         ->with('success', 'Jadwal kegiatan berhasil ditambahkan.');
    }

    // 4. Form edit jadwal kegiatan
    public function edit(Jadwal $jadwal)
    {
        return view('admin-side.jadwal-kegiatan.edit', compact('jadwal'));
    }

    // 5. Update jadwal kegiatan
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'id_petugasKader'  => 'required|integer',
            'id_posyandu'      => 'required|integer',
        ]);

        $jadwal->update($validated);

        return redirect()->route('jadwal-kegiatan.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    // 6. Hapus jadwal kegiatan
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal-kegiatan.index')
                         ->with('success', 'Jadwal berhasil dihapus.');
    }
}
