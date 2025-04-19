<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eventUserController extends Controller
{
    /**
     * Display the user dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user-side.eventPlanner.index');
    }
}
