<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardUserController extends Controller
{
    /**
     * Display the user dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user-side.userDashboard.index');
    }
}
