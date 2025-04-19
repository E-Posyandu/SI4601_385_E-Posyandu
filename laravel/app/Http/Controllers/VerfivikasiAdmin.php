<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class VerifikasiAkunController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->get();

        return view('admin-side.verifikasi.index', compact('users'));
    }

    public function saveStatus(Request $request)
    {
        foreach ($request->status as $userId => $status) {
            DB::table('users')->where('id', $userId)->update(['status' => $status]);
        }

        return redirect()->route('verifikasi-akun.index')->with('success', 'Perubahan status berhasil disimpan.');
    }
}
