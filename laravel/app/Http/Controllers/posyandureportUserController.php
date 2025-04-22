<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class posyandureportUserController extends Controller
{
    /**
     * Display the user dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user-side.posyanduReport.index');
    }
}
