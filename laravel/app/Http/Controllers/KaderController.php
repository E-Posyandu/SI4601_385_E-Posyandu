<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    public function index()
    {
        return view('kader-side.dashboard');
    }
}
