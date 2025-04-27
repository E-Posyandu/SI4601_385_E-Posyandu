<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin-side.accountVerification.index', compact('users'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();

        return redirect()->route('accountVerification.index')->with('success', 'Akun berhasil disetujui.');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = false;
        $user->save();

        return redirect()->route('accountVerification.index')->with('success', 'Akun ditolak.');
    }
}
