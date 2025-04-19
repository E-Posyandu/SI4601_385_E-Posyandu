<?php

namespace App\Http\Controllers;

use App\Models\balita;
use App\Models\dailyreport;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class dailyreportUserController extends Controller
{
    public function index(Request $request)
    {
        $id_balita = 4; 
        $selectedDate = $request->input('date', Carbon::today()->toDateString());

        $history = DailyReport::where('id_balita', $id_balita)
            ->orderBy('tanggal', 'desc')
            ->get();

        $reportToday = DailyReport::where('id_balita', $id_balita)
            ->whereDate('tanggal', $selectedDate)
            ->first();

        $balita = Balita::find($id_balita);
        $reports = $history;

        return view('user-side.dailyReport.index', compact('reportToday', 'history', 'reports', 'selectedDate', 'balita'));
    }

    public function create()
    {
        $id_balita = 4;
        $balita = Balita::find($id_balita);
    
        if (!$balita) {
            return redirect()->route('dailyReport.index')->with('error', 'Data balita tidak ditemukan.');
        }
    
        return view('user-side.dailyReport.create', compact('balita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string'
        ]);

        $dailyReport = DailyReport::create([
            'id_balita' => 4,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('user-side.dailyReport.show', ['id' => $dailyReport->id])
                        ->with('success', 'Laporan harian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $report = dailyreport::findOrFail($id); 
        return redirect()->route('user-side.dailyReport.show')->with('success', 'Laporan harian berhasil ditambahkan.');
    }
}
