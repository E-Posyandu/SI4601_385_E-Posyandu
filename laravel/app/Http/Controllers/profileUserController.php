<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileUserController extends Controller
{
    /**
     * Display the user dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $balita = Balita::where('id_orangtua', $user->id)->first();

        if (!$balita) {
            return redirect()->back()->with('error', 'Data balita tidak ditemukan.');
        }

        return view('user-side.profileUser.index', compact('balita'));
    }

}
