@extends('kader-side.layout-kader.app')

@section('title', 'Edit Kunjungan')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Edit Data Kunjungan</h3>

        <form action="{{ route('kunjungan.update', $visited->id_kunjungan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_balita" class="form-label">Nama Balita</label>
                <select name="id_balita" class="form-select" required>
                    @foreach($balitas as $balita)
                        <option value="{{ $balita->id_balita }}" {{ $visited->id_balita == $balita->id_balita ? 'selected' : '' }}>
                            {{ $balita->nama_balita }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_penimbangan" class="form-label">Tanggal Penimbangan</label>
                <input type="date" name="tanggal_penimbangan" class="form-control" value="{{ $visited->tanggal_penimbangan }}" required>
            </div>

            <div class="mb-3">
                <label for="bulan_penimbangan" class="form-label">Bulan Penimbangan</label>
                <input type="date" name="bulan_penimbangan" class="form-control" value="{{ $visited->bulan_penimbangan }}" required>
            </div>

            <div class="mb-3">
                <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                <input type="number" step="0.1" name="berat_badan" class="form-control" value="{{ $visited->berat_badan }}" required>
            </div>

            <div class="mb-3">
                <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                <input type="number" step="0.1" name="tinggi_badan" class="form-control" value="{{ $visited->tinggi_badan }}" required>
            </div>

            <div class="mb-3">
                <label for="lingkar_kepala" class="form-label">Lingkar Kepala (cm)</label>
                <input type="number" step="0.1" name="lingkar_kepala" class="form-control" value="{{ $visited->lingkar_kepala }}" required>
            </div>

            <div class="mb-3">
                <label for="lingkat_lengan" class="form-label">Lingkar Lengan (cm)</label>
                <input type="number" step="0.1" name="lingkat_lengan" class="form-control" value="{{ $visited->lingkat_lengan }}" required>
            </div>

            <div class="mb-3">
                <label for="status_gizi" class="form-label">Status Gizi</label>
                <input type="text" name="status_gizi" class="form-control" value="{{ $visited->status_gizi }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ASI Eksklusif</label>
                <select name="asi_esklusif" class="form-select" required>
                    <option value="1" {{ $visited->asi_esklusif ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$visited->asi_esklusif ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_posyandu" class="form-label">Posyandu</label>
                <select name="id_posyandu" class="form-select" required>
                    @foreach(\App\Models\posyandu::all() as $pos)
                        <option value="{{ $pos->id_posyandu }}" {{ $visited->id_posyandu == $pos->id_posyandu ? 'selected' : '' }}>
                            {{ $pos->nama_posyandu }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_petugas_kader" class="form-label">Petugas Kader</label>
                <select name="id_petugas_kader" class="form-select" required>
                    @foreach(\App\Models\petugas::all() as $petugas)
                        <option value="{{ $petugas->id_petugas_kader }}" {{ $visited->id_petugas_kader == $petugas->id_petugas_kader ? 'selected' : '' }}>
                            {{ $petugas->nama_petugas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-end">
                <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</main>
@endsection
