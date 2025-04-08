<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class CreateJadwalKegiatanController extends Controller
{
    public function store(Request $request)
    {
        // Memvalidasi data yang masuk
        $validated = $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'id_petugasKader'  => 'required|integer',
            'id_posyandu'      => 'required|integer',
        ]);

        // Menyimpan data ke tabel jadwal
        $jadwal = Jadwal::create([
            'nama_kegiatan'    => $validated['nama_kegiatan'],
            'jenis_kegiatan'   => $validated['jenis_kegiatan'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'id_petugasKader'  => $validated['id_petugasKader'],
            'id_posyandu'      => $validated['id_posyandu'],
        ]);

        // Mengembalikan response JSON
        return response()->json([
            'message' => 'Jadwal kegiatan berhasil ditambahkan.',
            'data'    => $jadwal
        ], 201);
    }
}
