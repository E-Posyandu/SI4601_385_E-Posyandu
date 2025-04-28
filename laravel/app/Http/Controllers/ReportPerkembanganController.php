<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Balita;
use App\Models\ReportPerkembangan;

class ReportPerkembanganController extends Controller
{
    public function index()
    {
        $balita = Balita::all();
        return view('admin-side.report-perkembangan.index', compact('balita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_balita' => 'required|exists:table_balita,id_balita',
            'tanggal' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('reports', 'public');

        ReportPerkembangan::create([
            'id_balita' => $request->id_balita,
            'tanggal' => $request->tanggal,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Report berhasil disimpan!');
    }

    public function destroy($id)
    {
        $report = ReportPerkembangan::findOrFail($id);

        // Hapus file dari storage
        if ($report->file_path && Storage::disk('public')->exists($report->file_path)) {
            Storage::disk('public')->delete($report->file_path);
        }

        // Hapus data dari database
        $report->delete();

        return redirect()->back()->with('success', 'Report berhasil dihapus.');
    }
}
