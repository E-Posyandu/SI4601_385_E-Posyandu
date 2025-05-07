@extends('kader-side.layout-kader.app')

@section('title', 'Tambah Data Kunjungan')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Tambah Data Kunjungan Balita</h3>

        {{-- Session Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Kunjungan --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kunjungan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_balita" class="form-label">Nama Balita</label>
                        <select name="id_balita" id="id_balita" class="form-control" dusk="id-balita" required>
                            <option value="">-- Pilih Balita --</option>
                            @foreach($balitas as $balita)
                                <option value="{{ $balita->id_balita}}">{{ $balita->nama_balita }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_penimbangan" class="form-label">Tanggal Penimbangan</label>
                        <input type="date" name="tanggal_penimbangan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="bulan_penimbangan" class="form-label">Bulan Penimbangan</label>
                        <input type="date" name="bulan_penimbangan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                        <input type="number" step="0.01" name="berat_badan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                        <input type="number" step="0.01" name="tinggi_badan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="lingkar_kepala" class="form-label">Lingkar Kepala (cm)</label>
                        <input type="number" step="0.01" name="lingkar_kepala" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="lingkat_lengan" class="form-label">Lingkar Lengan (cm)</label>
                        <input type="number" step="0.01" name="lingkat_lengan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="status_gizi" class="form-label">Status Gizi</label>
                        <input type="text" name="status_gizi" class="form-control" placeholder="Contoh: Normal, Gizi Kurang" required>
                    </div>

                    <div class="mb-3">
                        <label for="asi_esklusif" class="form-label">ASI Eksklusif</label>
                        <select name="asi_esklusif" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_posyandu" class="form-label">Posyandu</label>
                        <select name="id_posyandu" id="id_posyandu" class="form-control" required>
                            <option value="">-- Pilih Posyandu --</option>
                            @foreach($posyandus as $posyandu)
                                <option value="{{ $posyandu->id_posyandu }}">{{ $posyandu->nama_posyandu }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_petugas_kader" class="form-label">Petugas Kader</label>
                        <select name="id_petugas_kader" id="id_petugas_kader" class="form-control" required>
                            <option value="">-- Pilih Petugas --</option>
                            @foreach($petugas_kaders as $petugas)
                                <option value="{{ $petugas->id_petugas_kader }}">{{ $petugas->nama_petugas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
