<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function create()
    {
        return view('admin-side.artikel.create');
    }
}
