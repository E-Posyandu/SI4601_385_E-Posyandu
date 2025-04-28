<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\petugas;
use App\Models\Posyandu;

class JadwalKegiatanController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('admin-side.jadwal-kegiatan.index', compact('jadwals'));
    }

    public function create()
    {
        $petugas_kader = petugas::all(); 
        $posyandus = Posyandu::all();          
        return view('admin-side.jadwal-kegiatan.create', compact('petugas_kader', 'posyandus'));
    }

    // 3. Simpan jadwal kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'id_petugas_kader' => 'required|exists:table_petugas_kader,id_petugas_kader',
            'id_posyandu'      => 'required|exists:table_posyandu,id_posyandu',
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
            'id_petugas_kader' => 'required|exists:table_petugas_kader,id_petugas_kader',
            'id_posyandu'      => 'required|exists:table_posyandu,id_posyandu',
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
