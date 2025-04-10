<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balita;
use App\Models\orangtua;

class BalitaController extends Controller
{
    // fucntion untuk menampilkan data balita
    public function index() {
        $balita = balita::with('orangtua')->get();
        return view('babies', compact('babies'));
    }

    // function untuk create data balita
    public function create() {
        $orangtuas = orangtua::all();
        return view('create', compact('orangtuas'));
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
        return view('edit', compact('baby', 'orangtuas'));
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
    public function show($id) {
        $balita = balita::findOrFail($id);
        return view('show', compact('baby'));
    }
}
