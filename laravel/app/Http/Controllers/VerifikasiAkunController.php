<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Orangtua;
use Illuminate\Http\Request;

class VerifikasiAkunController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');
        
        $query = Balita::with('orangtua');
        
        if ($status && in_array($status, ['waiting', 'approved', 'rejected'])) {
            $query->where('status_akun', $status);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_balita', 'like', "%{$search}%")
                  ->orWhere('nik_anak', 'like', "%{$search}%")
                  ->orWhereHas('orangtua', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%")
                        ->orWhere('no_telp', 'like', "%{$search}%");
                  });
            });
        }
        
        $balitas = $query->paginate(10)->appends($request->query());
        
        return view('admin-side.akun-verifikasi.index', compact('balitas'));
    }

   
    public function show($id_balita)
    {
        $balita = Balita::with('orangtua')
                        ->where('id_balita', $id_balita)
                        ->firstOrFail();
                        
        return view('admin-side.akun-verifikasi.show', compact('balita'));
    }
    
    public function updateStatus(Request $request, $id_balita)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);
        
        $balita = Balita::where('id_balita', $id_balita)->firstOrFail();
        $balita->status_akun = $request->status;
        $balita->save();
        
        return back()->with('success', 'Status berhasil diperbaruii');
    }
}