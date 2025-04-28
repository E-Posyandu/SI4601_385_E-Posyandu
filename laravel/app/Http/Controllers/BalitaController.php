<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balita;
use App\Models\orangtua;
use App\Models\visited;
use Carbon\Carbon;
use App\Models\ReportPerkembangan;


class BalitaController extends Controller
{
    // fucntion untuk menampilkan data balita
    public function index(Request $request) 
    {
        $keyword = $request->input('search');

        $balita = balita::with(['orangtua', 'kunjunganTerakhir'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama_balita', 'like', '%' . $keyword . '%');
            })
            ->get();

        return view('admin-side.data-bayi.index', compact('balita'));
    }


    // function untuk create data balita
    public function create() {
        $orangtuas = orangtua::all();
        return view('admin-side.data-bayi.create', compact('orangtuas'));
    }

    //function untuk menyimpan data balita
    public function store(Request $request) {
        $request->validate([
            'nama_balita' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' =>'required|numeric',
            'orangtua_id' =>'required|exists:orangtua,id',
            'id_vaksin' => 'required|exists:vaksin,id',
            'id_vitamin' =>'required|exists:vitamin,id',
            'username' => 'required',
            'password' => 'required'
        ]);
        balita::create($request->all());
        return redirect()->route('babies.index')->with('success', 'Data balita berhasil ditambahkan');
    }

    // function untuk edit data balita
    public function edit($id) {
        $balita = balita::findOrFail($id);
        $orangtuas = orangtua::all();
        return view('edit', compact('balita', 'orangtuas'));
    }

    // function untuk update data balita
    public function update(Request $request, $id) {
        $request->validate([
            'nama_balita' =>'required',
            'tanggal_lahir' =>'required|date',
            'jenis_kelamin' =>'required',
            'golongan_darah' =>'required',
            'berat_badan' =>'required|numeric',
            'tinggi_badan' =>'required|numeric',
            'orangtua_id' =>'required|exists:orangtua,id',
            'id_vaksin' =>'required|exists:vaksin,id',
            'id_vitamin' =>'required|exists:vitamin,id',
            'username' =>'required',
            'password' =>'required'
        ]);
        $balita = balita::findOrFail($id);
        $balita->update($request->all());
        return redirect()->route('babies.index')->with('success', 'Data balita berhasil diupdate');
    }

    // function untuk delete data balita
    public function destroy($id) {
        $balita = balita::findOrFail($id);
        $balita->delete();
        return redirect()->route('babies.index')->with('success', 'Data balita berhasil dihapus');
    }

    // function untuk menampilkan data balita by Id
    public function show($id) 
    {
        $balita = balita::with('reportPerkembangan')->findOrFail($id);
        $kunjungan = visited::where('id_balita', $id)
            ->orderBy('tanggal_penimbangan')
            ->get(['tanggal_penimbangan', 'berat_badan', 'tinggi_badan', 'lingkar_kepala'])
            ->map(function ($item) {
                $item->bulan = Carbon::parse($item->tanggal_penimbangan)->isoFormat('MMMM YYYY'); 
                return $item;
            });


        // Ekstrak data untuk grafik
        $labels = $kunjungan->pluck('bulan_penimbangan');
        $berat = $kunjungan->pluck('berat_badan');
        $tinggi = $kunjungan->pluck('tinggi_badan');
        $lingkar = $kunjungan->pluck('lingkar_kepala');

        return view('admin-side.data-bayi.show', compact('balita', 'kunjungan', 'labels', 'berat', 'tinggi', 'lingkar'));
    }

}
