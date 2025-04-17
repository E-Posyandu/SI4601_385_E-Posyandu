<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;

class VerifikasiAkunController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'status' => 'nullable|in:approved,rejected,waiting'
        ]);

        $query = Balita::with(['orangtua' => function($query) {
            $query->select('id_orangtua', 'nama_orangtua', 'email', 'no_telp');
        }]);


        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama_balita', 'like', '%'.$request->search.'%')
                  ->orWhere('nik_anak', 'like', '%'.$request->search.'%')
                  ->orWhereHas('orangtua', function($q) use ($request) {
                      $q->where('email', 'like', '%'.$request->search.'%')
                        ->orWhere('no_telp', 'like', '%'.$request->search.'%')
                        ->orWhere('nama_orangtua', 'like', '%'.$request->search.'%');
                  });
            });
        }


        $status = $request->status ?? 'waiting';
        $query->where('status_akun', $status);

        $balitas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin-side.akun-verifikasi.index', [
            'balitas' => $balitas,
            'search' => $request->search,
            'status' => $status
        ]);
    }


    public function show($id)
    {
        $balita = Balita::with('orangtua')->findOrFail($id);
        return view('admin-side.akun-verifikasi.show', compact('balita'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'catatan' => 'nullable|string|max:500'
        ]);

        $balita = Balita::findOrFail($id);
        $balita->update([
            'status_akun' => $request->status,
            'catatan_verifikasi' => $request->catatan
        ]);

        return redirect()->route('verifikasi-akun.index')
            ->with('success', 'Status akun berhasil diperbarui.');
    }
}